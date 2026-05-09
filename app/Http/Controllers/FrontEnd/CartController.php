<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BackEnd\Cart;
use App\Models\BackEnd\Product; // এটি যোগ করা হয়েছে
use App\Models\BackEnd\UserInteraction;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $userId = auth('sanctum')->id();
        $cartItems = Cart::with('product')->where('user_id', $userId)->latest()->get();
        return response()->json($cartItems);
    }

    public function store(Request $request)
    {
        $userId = auth('sanctum')->id();
        if (!$userId) {
            return response()->json(['message' => 'Please login first'], 401);
        }

        $productId = $request->product_id;

        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $cart = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->where('color', $request->color)
            ->where('size', $request->size)
            ->first();

        if ($cart) {
            $cart->increment('qty', $request->qty ?? 1);
        } else {
            Cart::create([
                'user_id'    => $userId,
                'product_id' => $productId,
                'qty'        => $request->qty ?? 1,
                'price'      => $product->discount_price ?? $product->price,
                'color'      => $request->color,
                'size'       => $request->size,
            ]);
        }

        UserInteraction::updateOrCreate(
            ['user_id' => $userId, 'product_id' => $productId, 'interaction_type' => 'cart'],
            ['weight' => 3, 'updated_at' => now()]
        );

        return response()->json(['message' => 'Added to cart successfully'], 200);
    }

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
