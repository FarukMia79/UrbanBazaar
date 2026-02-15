<?php

namespace App\Http\Controllers\BackEnd\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\Color;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $color = Color::latest()->get();
        return response()->json($color);
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
            'name' => 'required|unique:colors|max:255',
        ]);

        $color = new Color();
        $color->name = $request->name;
        $color->color_code = $request->color_code;
        $color->status = (int) $request->status;
        $color->save();
        return response()->json(['message' => 'Color create successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $color = Color::findOrFail($id);
        return response()->json($color);
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
            'name' => 'required|max:255',
        ]);

        $color = Color::findOrFail($id);
        $color->name = $request->name;
        $color->color_code = $request->color_code;
        $color->status = (int) $request->status;
        $color->save();
        return response()->json(['message' => 'Color updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();
    }
}
