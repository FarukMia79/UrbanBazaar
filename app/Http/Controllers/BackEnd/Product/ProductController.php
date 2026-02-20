<?php

namespace App\Http\Controllers\BackEnd\Product;

use App\Http\Controllers\Controller;
use App\Models\BackEnd\Product;
use App\Models\BackEnd\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\BackEnd\Color;
use App\Models\BackEnd\Size;
use App\Models\BackEnd\UserInteraction;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::with('category')->latest()->get();
        return response()->json($product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'price' => 'required|numeric',
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

            // Boolean Status ও Hot Deals
            $product->status = (int) $request->status;
            $product->hot_deals = (int) $request->hot_deals;


            if ($request->color_ids) {
                $product->color_ids = explode(',', $request->color_ids);
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


            if ($request->hasFile('multi_images')) {
                $galleryFiles = $request->file('multi_images');

                $galleryPath = public_path('uploads/products/gallery/');
                if (!file_exists($galleryPath)) {
                    mkdir($galleryPath, 0777, true);
                }

                foreach ($galleryFiles as $multi_file) {
                    $multi_name = time() . '_gallery_' . uniqid() . '.' . $multi_file->getClientOriginalExtension();

                    $galleryImage = $manager->read($multi_file);
                    $galleryImage->cover(1024, 1080);
                    $galleryImage->save($galleryPath . $multi_name);

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => 'uploads/products/gallery/' . $multi_name,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['message' => 'Product Created Successfully!'], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::with(['category', 'subcategory', 'brand', 'multi_images'])->findOrFail($id);

        // ২. কালার ডাটা নিয়ে আসা (JSON IDs থেকে)
        if ($product->color_ids && count($product->color_ids) > 0) {
            $product->colors = Color::whereIn('id', $product->color_ids)->get();
        } else {
            $product->colors = [];
        }

        // ৩. সাইজ ডাটা নিয়ে আসা (JSON IDs থেকে)
        if ($product->size_ids && count($product->size_ids) > 0) {
            $product->sizes = Size::whereIn('id', $product->size_ids)->get();
        } else {
            $product->sizes = [];
        }

        // ৪. রিকমেন্ডেশন লজিক (Collaborative Filtering) 🚀
        // এই প্রোডাক্টটি যারা দেখেছে তারা আর কী কী দেখেছে
        $userIds = UserInteraction::where('product_id', $id)
            ->pluck('user_id')
            ->unique();

        $recommendedProductIds = UserInteraction::whereIn('user_id', $userIds)
            ->where('product_id', '!=', $id)
            ->select('product_id', DB::raw('SUM(weight) as total_weight'))
            ->groupBy('product_id')
            ->orderBy('total_weight', 'desc')
            ->limit(10)
            ->pluck('product_id');

        $recommendations = Product::whereIn('id', $recommendedProductIds)
            ->where('status', 1)
            ->get();

        // ৫. Fallback লজিক: যদি এআই ডাটা না থাকে তবে একই ক্যাটাগরির প্রোডাক্ট দেখাবে
        if ($recommendations->isEmpty()) {
            $recommendations = Product::where('category_id', $product->category_id)
                ->where('id', '!=', $id)
                ->where('status', 1)
                ->limit(10)
                ->get();
        }

        // ৬. ইন্টারঅ্যাকশন ট্রাক করা (ভিউ হিসেবে ওয়েট ১ দেওয়া)
        if (auth('sanctum')->check()) {
            UserInteraction::updateOrCreate(
                [
                    'user_id' => auth('sanctum')->id(),
                    'product_id' => $id,
                    'interaction_type' => 'view'
                ],
                [
                    'weight' => 1,
                    'updated_at' => now()
                ]
            );
        }

        // ৭. ফাইনাল রেসপন্স
        return response()->json([
            'product' => $product,
            'recommendations' => $recommendations
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
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
        return response()->json(['message' => 'Product Deleted Successfully!']);
    }
}
