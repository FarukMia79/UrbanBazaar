<?php

namespace App\Http\Controllers\BackEnd\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\Order;
use App\Models\BackEnd\Product;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'stats' => [
                'total_order'     => Order::count(),
                'todays_order'    => Order::whereDate('created_at', now())->count(),
                'total_products'  => Product::count(),
                'total_customers' => User::where('role', 'user')->count(),
            ],
            'latest_orders' => Order::with(['user', 'orderItems.product'])->latest()->limit(7)->get(),
            'latest_customers' => User::where('role', 'customer')->latest()->limit(7)->get()
        ]);
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
        //
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
