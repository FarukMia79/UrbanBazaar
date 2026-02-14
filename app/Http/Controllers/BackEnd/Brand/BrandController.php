<?php

namespace App\Http\Controllers\BackEnd\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\Brand;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brand = Brand::latest()->get();
        return response()->json($brand);
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
            'name' => 'required|unique:brands|max:255',
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->meta_title = $request->meta_title;
        $brand->meta_description = $request->meta_description;
        $brand->status = $request->status;

        if ($request->hasFile('image')) {
            $file = request()->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $uploadPath = public_path('uploads/brands/');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->cover(512, 512);
            $image->save($uploadPath . $imageName);
            $brand->image = 'uploads/brand/' . $imageName;
        }
        $brand->save();
        return response()->json(['message' => 'Brand created successfully!']);
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
