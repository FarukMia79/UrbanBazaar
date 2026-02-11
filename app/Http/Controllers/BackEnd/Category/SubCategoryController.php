<?php

namespace App\Http\Controllers\BackEnd\Category;

use App\Http\Controllers\Controller;
use App\Models\BackEnd\SubCategory;
use App\Models\BackEnd\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\driver;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = SubCategory::with('category')->latest()->get();
        return response()->json($subcategories);
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
            'category_id' => 'required',
            'name' => 'required|max:255',
            'status' => 'required',
        ]);

        $sub = new SubCategory();
        $sub->category_id = $request->category_id;
        $sub->name = $request->name;
        $sub->slug = Str::slug($request->name);
        $sub->meta_title = $request->meta_title;
        $sub->meta_description = $request->meta_description;
        $sub->status = $request->status;
        $sub->front_view = $request->front_view;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $uploadPath = public_path('uploads/subcategory/');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->cover(512, 512);

            $image->save($uploadPath . $imageName);
            $sub->image = 'uploads/subcategory/' . $imageName;
        }

        $sub->save();
        return response()->json(['message' => 'SubCategory Created Successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        return response()->json($subcategory);
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
