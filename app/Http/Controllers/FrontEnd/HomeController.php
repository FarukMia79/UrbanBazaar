<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BackEnd\Product;
use App\Models\BackEnd\UserInteraction;



class HomeController extends Controller
{
    public function getPersonalizedRecommendations()
    {
        $userId = auth('sanctum')->id();

        $userProductIds = UserInteraction::where('user_id', $userId)
            ->pluck('product_id')
            ->toArray();

        $similarUserIds = UserInteraction::whereIn('product_id', $userProductIds)
            ->where('user_id', '!=', $userId)
            ->pluck('user_id')
            ->unique();

        $recommendedProductIds = UserInteraction::whereIn('user_id', $similarUserIds)
            ->whereNotIn('product_id', $userProductIds)
            ->select('product_id', DB::raw('SUM(weight) as total_score'))
            ->groupBy('product_id')
            ->orderBy('total_score', 'desc')
            ->limit(10)
            ->pluck('product_id');

        if ($recommendedProductIds->isEmpty()) {
            $recommendations = Product::where('status', 1)->orderBy('id', 'desc')->limit(10)->get();
        } else {
            $recommendations = Product::whereIn('id', $recommendedProductIds)->where('status', 1)->get();
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
