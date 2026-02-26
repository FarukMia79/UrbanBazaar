<?php

namespace App\Http\Controllers\BackEnd\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BackEnd\Order;
use App\Models\BackEnd\OrderItem;
use Illuminate\Support\Facades\Auth;
use App\Models\BackEnd\UserInteraction;
use App\Models\BackEnd\Product;
use App\Models\BackEnd\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::latest()->get();
        return response()->json($order);
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
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'shipping_cost' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'total' => 'required|numeric',
            'items' => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            $order = new Order();
            $order->user_id = Auth::id();
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->area = $request->area;
            $order->payment_method = $request->payment_method;
            $order->shipping_cost = $request->shipping_cost;
            $order->subtotal = $request->subtotal;
            $order->total = $request->total;
            $order->status = 'pending';
            $order->save();

            foreach ($request->items as $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $item['product_id'];
                $orderItem->color = $item['color'] ?? null;
                $orderItem->size = $item['size'] ?? null;
                $orderItem->qty = $item['qty'];
                $orderItem->price = $item['price'];
                $orderItem->save();

                UserInteraction::updateOrCreate(
                    [
                        'user_id' => Auth::id(),
                        'product_id' => $item['product_id'],
                        'interaction_type' => 'purchase'
                    ],
                    [
                        'weight' => 5,
                        'updated_at' => now()
                    ]
                );

                $product = Product::find($item['product_id']);
                if ($product) {
                    $product->decrement('stock_quantity', $item['qty']);
                }
            }

            Cart::where('user_id', Auth::id())->delete();

            DB::commit();

            return response()->json([
                'message' => 'Your order has been placed successfully!',
                'order_id' => $order->id
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ], 500);
        }
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
    public function update(Request $request, $id)
    {
        //
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return response()->json([
            'message' => 'Order status updated to ' . $request->status
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
