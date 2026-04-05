<?php

namespace App\Http\Controllers\BackEnd\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\Order;
use App\Models\BackEnd\Product;
use App\Models\BackEnd\UserInteraction;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // চার্টের জন্য ডাটা (ভিউ, কার্ট এবং পারচেজ এর সংখ্যা)
        $interactionStats = UserInteraction::select('interaction_type', DB::raw('count(*) as total'))
            ->groupBy('interaction_type')
            ->get();

        // এআই ইন্টারঅ্যাকশন লগ (ইউজার এবং প্রোডাক্টের তথ্যসহ)
        $aiLogs = UserInteraction::with(['user', 'product'])
            ->latest()
            ->limit(6)
            ->get();

        return response()->json([
            'stats' => [
                'total_order'     => Order::count(),
                'todays_order'    => Order::whereDate('created_at', now())->count(),
                'total_products'  => Product::count(),
                'total_customers' => User::where('role', 'user')->count(),
                'ai_data_points'  => UserInteraction::count(),
            ],
            'chart_data'       => $interactionStats,
            'ai_logs'          => $aiLogs,
            'latest_orders'    => Order::with(['user', 'orderItems.product'])->latest()->limit(7)->get(),
            'latest_customers' => User::where('role', 'user')->latest()->limit(7)->get()
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
