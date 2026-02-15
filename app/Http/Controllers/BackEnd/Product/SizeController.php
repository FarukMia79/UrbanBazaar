<?php

namespace App\Http\Controllers\BackEnd\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\Size;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $size = Size::latest()->get();
        return response()->json($size);
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
            'name' => 'required|unique:sizes|max:255',
        ]);

        $size = new Size();
        $size->name = $request->name;
        $size->status = (int) $request->status;
        $size->save();
        return response()->json(['message' => 'Size create successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $size = Size::findOrFail($id);
        return response()->json($size);
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

        $size = Size::findOrFail($id);
        $size->name = $request->name;
        $size->status = (int) $request->status;
        $size->save();
        return response()->json(['message' => 'Size updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $size = Size::findOrFail($id);
        $size->delete();
    }
}
