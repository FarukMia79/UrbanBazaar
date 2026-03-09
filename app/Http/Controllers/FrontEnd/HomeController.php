<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BackEnd\Product;
use App\Models\BackEnd\UserInteraction;
use Illuminate\Support\Facades\Http;



class HomeController extends Controller
{
    public function getPersonalizedRecommendations()
    {
        $userId = auth('sanctum')->id();

        // ১. যদি ইউজার লগইন না থাকে, তবে লেটেস্ট প্রোডাক্ট দেখাবে
        if (!$userId) {
            return response()->json(Product::where('status', 1)->latest()->limit(10)->get());
        }

        try {
            /** 
             * ২. পাইথন এআই সার্ভিস কল করা (FastAPI)
             * আমরা পাইথন সার্ভিসটি পোর্ট ৮০৮০ বা ৮০০১ এ রান করব 
             */
            $response = Http::timeout(2)->get("http://127.0.0.1:8001/recommend/{$userId}");

            if ($response->successful()) {
                $recommendedProductIds = $response->json()['recommendations'];

                if (!empty($recommendedProductIds)) {
                    // পাইথন থেকে পাওয়া আইডি অনুযায়ী প্রোডাক্ট আনা
                    $recommendations = Product::whereIn('id', $recommendedProductIds)
                        ->where('status', 1)
                        ->get()
                        ->sortBy(function ($product) use ($recommendedProductIds) {
                            return array_search($product->id, $recommendedProductIds);
                        })->values();

                    return response()->json($recommendations);
                }
            }
        } catch (\Exception $e) {
            // পাইথন সার্ভার বন্ধ থাকলে বা এরর হলে নিচে লারাভেল ব্যাকআপ লজিক কাজ করবে
        }

        /** 
         * ৩. ব্যাকআপ লজিক (আপনার আগের লারাভেল কোড)
         * পাইথন সার্ভিস কাজ না করলে এটি ইউজারের সিমিলার ইউজারদের ডাটা দেখাবে
         */
        $userProductIds = UserInteraction::where('user_id', $userId)
            ->pluck('product_id')
            ->toArray();

        $similarUserIds = UserInteraction::whereIn('product_id', $userProductIds)
            ->where('user_id', '!=', $userId)
            ->pluck('user_id')
            ->unique();

        $backupProductIds = UserInteraction::whereIn('user_id', $similarUserIds)
            ->whereNotIn('product_id', $userProductIds)
            ->select('product_id', DB::raw('SUM(weight) as total_score'))
            ->groupBy('product_id')
            ->orderBy('total_score', 'desc')
            ->limit(10)
            ->pluck('product_id');

        if ($backupProductIds->isEmpty()) {
            $recommendations = Product::where('status', 1)->orderBy('id', 'desc')->limit(10)->get();
        } else {
            $recommendations = Product::whereIn('id', $backupProductIds)->where('status', 1)->get();
        }

        return response()->json($recommendations);
    }
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
