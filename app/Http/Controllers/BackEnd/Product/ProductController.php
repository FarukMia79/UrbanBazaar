<?php

namespace App\Http\Controllers\BackEnd\Product;

use App\Http\Controllers\Controller;
use App\Models\BackEnd\Product;
use App\Models\BackEnd\ProductImage;
use App\Models\BackEnd\UserInteraction;
use App\Models\BackEnd\Size;
use App\Models\BackEnd\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http; // ১ নম্বর ফিক্স: এই লাইনটি যোগ করা হয়েছে
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::with('category')->latest()->get();
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'tags' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->product_code = $request->product_code;
            $product->unit = $request->unit;
            $product->video_url = $request->video_url;
            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->brand_id = $request->brand_id;
            $product->price = $request->price;
            $product->discount_price = $request->discount_price;
            $product->stock_quantity = $request->stock_quantity;
            $product->description = $request->description;
            $product->status = (int) $request->status;
            $product->hot_deals = (int) $request->hot_deals;

            if ($request->tags) {
                $tagsArray = array_map('trim', explode(',', $request->tags));
                $product->tags = $tagsArray;
            }

            if ($request->size_ids) {
                $product->size_ids = explode(',', $request->size_ids);
            }

            if ($request->tags) {
                $product->tags = explode(',', $request->tags);
            } else {
                $product->tags = explode(' ', $request->name);
            }

            $manager = new ImageManager(new Driver());

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $uploadPath = public_path('uploads/products/');
                if (!file_exists($uploadPath)) {
                    mkdir($uploadPath, 0777, true);
                }

                $image = $manager->read($file);
                $image->cover(1024, 1080);
                $image->save($uploadPath . $imageName);
                $product->image = 'uploads/products/' . $imageName;
            }

            $product->save();

            $variantImages = [];
            $variantIndices = $request->variant_indices ? explode(',', $request->variant_indices) : [];

            if ($request->hasFile('multi_images')) {
                $galleryFiles = $request->file('multi_images');
                $galleryPath = public_path('uploads/products/gallery/');
                if (!file_exists($galleryPath)) {
                    mkdir($galleryPath, 0777, true);
                }

                foreach ($galleryFiles as $index => $multi_file) {
                    $multi_name = time() . '_gallery_' . $index . '_' . uniqid() . '.' . $multi_file->getClientOriginalExtension();

                    $galleryImage = $manager->read($multi_file);
                    $galleryImage->cover(1024, 1080);
                    $galleryImage->save($galleryPath . $multi_name);

                    $db_path = 'uploads/products/gallery/' . $multi_name;

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $db_path,
                    ]);

                    if (in_array($index, $variantIndices)) {
                        $variantImages[] = $db_path;
                    }
                }
            }

            $product->color_ids = $variantImages;
            $product->save();

            DB::commit();
            return response()->json(['message' => 'Product Created Successfully!'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $product = Product::with(['category', 'subcategory', 'brand', 'multi_images'])
            ->withAvg('reviews as average_rating', 'ratting')
            ->withCount('reviews')
            ->findOrFail($id);

        $product->colors = $product->color_ids ?? [];

        if ($product->size_ids && count($product->size_ids) > 0) {
            $product->sizes = Size::whereIn('id', $product->size_ids)->get();
        } else {
            $product->sizes = [];
        }

        $userIds = UserInteraction::where('product_id', $id)->pluck('user_id')->unique();
        $recommendedProductIds = UserInteraction::whereIn('user_id', $userIds)
            ->where('product_id', '!=', $id)
            ->select('product_id', DB::raw('SUM(weight) as total_weight'))
            ->groupBy('product_id')
            ->orderBy('total_weight', 'desc')
            ->limit(40)
            ->pluck('product_id');

        $recommendations = Product::whereIn('id', $recommendedProductIds)->where('status', 1)->get();

        if ($recommendations->isEmpty()) {
            $recommendations = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->where('status', 1)->limit(10)->get();
        }

        // ভিউ ট্রাক করা
        if (auth('sanctum')->check()) {
            UserInteraction::updateOrCreate(
                ['user_id' => auth('sanctum')->id(), 'product_id' => $id, 'interaction_type' => 'view'],
                ['weight' => 1, 'updated_at' => now()]
            );
        }

        return response()->json([
            'product' => $product,
            'recommendations' => $recommendations
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'tags' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);

            $product->name = $request->name;
            $product->slug = Str::slug($request->name);
            $product->product_code = $request->product_code;
            $product->unit = $request->unit;
            $product->video_url = $request->video_url;
            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->brand_id = $request->brand_id;
            $product->price = $request->price;
            $product->discount_price = $request->discount_price;
            $product->stock_quantity = $request->stock_quantity;
            $product->description = $request->description;
            $product->status = (int) $request->status;
            $product->hot_deals = (int) $request->hot_deals;


            if ($request->tags) {
                $tagsArray = array_map('trim', explode(',', $request->tags));
                $product->tags = $tagsArray;
            }

            if ($request->size_ids) {
                $product->size_ids = explode(',', $request->size_ids);
            }

            $manager = new ImageManager(new Driver());

            if ($request->hasFile('image')) {
                if ($product->image && file_exists(public_path($product->image))) {
                    unlink(public_path($product->image));
                }
                $file = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $image = $manager->read($file);
                $image->cover(1024, 1080);
                $image->save(public_path('uploads/products/') . $imageName);
                $product->image = 'uploads/products/' . $imageName;
            }
            $product->save();

            $currentOldPaths = $request->old_images ?? [];
            $variantIndices = $request->variant_indices ? explode(',', $request->variant_indices) : [];

            $imagesToDelete = ProductImage::where('product_id', $id)
                ->whereNotIn('image_path', $currentOldPaths)
                ->get();
            foreach ($imagesToDelete as $oldImg) {
                if (file_exists(public_path($oldImg->image_path))) {
                    unlink(public_path($oldImg->image_path));
                }
                $oldImg->delete();
            }


            $newColorPaths = [];

            foreach ($currentOldPaths as $index => $path) {
                if (in_array($index, $variantIndices)) {
                    $newColorPaths[] = $path;
                }
            }

            if ($request->hasFile('new_images')) {
                $galleryFiles = $request->file('new_images');
                $galleryPath = public_path('uploads/products/gallery/');
                $startIndex = count($currentOldPaths);

                foreach ($galleryFiles as $subIndex => $multi_file) {
                    $actualIndex = $startIndex + $subIndex;
                    $multi_name = time() . '_gallery_' . $subIndex . '_' . uniqid() . '.' . $multi_file->getClientOriginalExtension();
                    $galleryImage = $manager->read($multi_file);
                    $galleryImage->cover(1024, 1080);
                    $galleryImage->save($galleryPath . $multi_name);
                    $db_path = 'uploads/products/gallery/' . $multi_name;

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $db_path,
                    ]);

                    if (in_array($actualIndex, $variantIndices)) {
                        $newColorPaths[] = $db_path;
                    }
                }
            }

            $product->color_ids = $newColorPaths;
            $product->save();

            DB::commit();
            return response()->json(['message' => 'Product Updated Successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function bulkUpdatePrice(Request $request)
    {
        foreach ($request->products as $item) {
            Product::where('id', $item['id'])->update([
                'price'           => $item['price'],
                'discount_price'  => $item['discount_price'],
                'stock_quantity'  => $item['stock_quantity'],
            ]);
        }
        return response()->json(['message' => 'All prices updated successfully!']);
    }

    
    public function aiSearch(Request $request)
    {
        $query = $request->q;
        if (!$query) return response()->json([]);

        try {
            $response = Http::get("http://127.0.0.1:8001/ai-search", [
                'q' => $query
            ]);

            if ($response->successful()) {
                $productIds = $response->json()['product_ids'];

                if (empty($productIds)) return response()->json([]);

                // পাইথন থেকে পাওয়া আইডি অনুযায়ী ডাটাবেস থেকে প্রোডাক্টের ডিটেইলস আনা
                $products = Product::whereIn('id', $productIds)
                    ->where('status', 1)
                    ->get();

                // আইডি অনুযায়ী ম্যানুয়ালি সর্টিং করা (এআই সিমিলারিটি বজায় রাখার জন্য)
                $sortedProducts = collect($productIds)->map(function ($id) use ($products) {
                    return $products->where('id', $id)->first();
                })->filter()->values();

                return response()->json($sortedProducts);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'AI Service is down'], 500);
        }
    }

    

    public function destroy($id)
    {
        $product = Product::with('multi_images')->findOrFail($id);
        if (file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
        foreach ($product->multi_images as $multi_img) {
            if (file_exists(public_path($multi_img->image_path))) {
                unlink(public_path($multi_img->image_path));
            }
        }
        $product->delete();
        return response()->json(['message' => 'Deleted Successfully!']);
    }
}
