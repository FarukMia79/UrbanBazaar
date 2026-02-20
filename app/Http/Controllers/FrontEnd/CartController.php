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
        $userId = auth('sanctum')->id();

        // এখানে অবশ্যই with('product') থাকতে হবে
        $cartItems = Cart::with('product')
            ->where('user_id', $userId)
            ->latest()
            ->get();

        return response()->json($cartItems);
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


        UserInteraction::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'interaction_type' => 'cart' 
            ],
            [
                'weight' => 3, 
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
    public function destroy($id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['message' => 'Item removed from cart'], 200);
        }

        return response()->json(['message' => 'Item not found'], 404);
    }
}
