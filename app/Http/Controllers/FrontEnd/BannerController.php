<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\Banner;
use App\Models\BackEnd\BannerCategory;
use Intervention\Image\Drivers\Gd\driver;

use Intervention\Image\ImageManager;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::latest()->get();
        return response()->json($banners);
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

        $banner = new BannerCategory();
        $banner->name = $request->name;
        $banner->status = (int) $request->status;
        $banner->save();
        return response()->json(['message' => 'Banner Created Successfully!']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'image'       => 'required|image|mimes:jpeg,png,jpg,webp',
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
            $image->cover(1060, 395);
            $banner->image = 'uploads/banner/' . $imageName;
        }

        $banner->save();
        return response()->json(['message' => 'Created Successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
