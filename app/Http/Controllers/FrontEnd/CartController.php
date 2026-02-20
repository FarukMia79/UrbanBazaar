<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BackEnd\Cart;
use App\Models\BackEnd\UserInteraction;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
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
        if (!Auth::check()) {
            return response()->json(['message' => 'Please login first'], 401);
        }

        $user_id = Auth::id();

        // ১. কার্টে ডাটা সেভ বা আপডেট করা
        // একই প্রোডাক্ট, একই কালার ও সাইজ হলে শুধু কোয়ান্টিটি বাড়বে
        Cart::updateOrCreate(
            [
                'user_id' => $user_id,
                'product_id' => $request->product_id,
                'color' => $request->color,
                'size' => $request->size,
            ],
            [
                'qty' => DB::raw('qty + ' . $request->qty),
                'price' => $request->price
            ]
        );

        // ২. রিকমেন্ডেশন ইঞ্জিনের জন্য ইন্টারঅ্যাকশন ট্রাক করা (AI Logic) 🚀
        // ইউজার কার্টে যোগ করেছে মানে তার আগ্রহ অনেক। আমরা ওয়েট ৩ দিচ্ছি।
        UserInteraction::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'interaction_type' => 'cart' // একই কাজের জন্য একটি রো থাকবে
            ],
            [
                'weight' => 3, // প্রতিবার ৩-ই থাকবে, ডুপ্লিকেট হবে না
                'updated_at' => now()
            ]
        );

        return response()->json(['message' => 'Added to cart successfully'], 200);
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
