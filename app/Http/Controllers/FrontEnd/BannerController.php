<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\Banner;
use App\Models\BackEnd\BannerCategory;
use Intervention\Image\Drivers\Gd\Driver;

use Intervention\Image\ImageManager;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bannerCategory = BannerCategory::latest()->get();
        $banners = Banner::with('category')->get();
        return response()->json(['bannerCategory' => $bannerCategory, 'banners' => $banners]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function bannerStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $bannerCat = new BannerCategory();
        $bannerCat->name = $request->name;
        $bannerCat->status = (int) $request->status;
        $bannerCat->save();
        return response()->json(['message' => 'Banner Created Successfully!']);
    }
    public function bannerUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $bannerCat = BannerCategory::findOrFail($id);
        $bannerCat->name = $request->name;
        $bannerCat->status = (int) $request->status;
        $bannerCat->save();
        return response()->json(['message' => 'Banner updated Successfully!']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'image'       => 'required',
        ]);

        $banner = new Banner();
        $banner->category_id = $request->category_id;
        $banner->link = $request->link ?? '#';
        $banner->status = (int) $request->status;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $uploadPath = public_path('uploads/banner/');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->cover(980, 428);
            $image->save($uploadPath . $imageName);
            $banner->image = 'uploads/banner/' . $imageName;
        }

        $banner->save();
        return response()->json(['message' => 'Created Successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function showBannerCat($id)
    {
        $bannerCategory = BannerCategory::findOrFail($id);
        return response()->json(['bannerCategory' => $bannerCategory]);
    }
    public function show($id)
    {
        $banner = Banner::with('category')->findOrFail($id);
        return response()->json(['banner' => $banner]);
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
        ]);

        $banner = Banner::findOrFail($id);
        $banner->category_id = $request->category_id;
        $banner->status = (int) $request->status;

        if ($request->hasFile('image')) {

            if ($banner->image && file_exists($banner->image)) {
                unlink(public_path($banner->image));
            }

            $file = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $uploadPath = public_path('uploads/banner/');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->cover(980, 428);
            $image->save($uploadPath . $imageName);
            $banner->image = 'uploads/banner/' . $imageName;
        }
        $banner->save();
        return response()->json(['message' => 'Banner updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        if (file_exists($banner->image)) {
            unlink($banner->image);
        }
        $banner->delete();
    }
    public function bannerCatDelete($id)
    {
        $bannerCategory = BannerCategory::findOrFail($id);
        $bannerCategory->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
