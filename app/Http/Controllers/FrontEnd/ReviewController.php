<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BackEnd\UserInteraction;
use App\Models\FrontEnd\Review;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'product_id' => 'required',
            'ratting' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:1000',
        ]);

        if (!Auth::check()) {
            return response()->json(['message' => 'Please login to give a review'], 401);
        }

        $user = Auth::user();

        $review = Review::create([
            'name' => $user->name,
            'email' => $user->email ?? 'N/A',
            'ratting' => $request->ratting,
            'review' => $request->review,
            'product_id' => $request->product_id,
            'customer_id' => $user->id,
            'status' => 'pending',
        ]);


        UserInteraction::updateOrCreate(
            [
                'user_id' => $user->id,
                'product_id' => $request->product_id,
                'interaction_type' => 'rating'
            ],
            [
                'weight' => $request->ratting * 2,
                'updated_at' => now()
            ]
        );

        return response()->json(['message' => 'Review submitted! It will be visible after admin approval.'], 201);
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
