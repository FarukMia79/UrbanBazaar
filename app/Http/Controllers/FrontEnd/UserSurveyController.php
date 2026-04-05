<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackEnd\Product;
use App\Models\BackEnd\UserInteraction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserSurveyController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'category_ids' => 'required|array|min:1',
        ]);

        $userId = Auth::id();
        $categoryIds = $request->category_ids;

        try {
            foreach ($categoryIds as $catId) {
                /** 
                 * এই ক্যাটাগরির যেকোনো ১টি প্রোডাক্ট খুঁজে বের করা
                 * যাতে এআই বুঝতে পারে ইউজার এই ধরণের প্রোডাক্ট পছন্দ করে
                 */
                $product = Product::where('category_id', $catId)
                    ->where('status', 1)
                    ->first();

                if ($product) {
                    /** 
                     * ইউজার ইন্টারঅ্যাকশন টেবিলে এটি 'preference' হিসেবে সেভ করা
                     * আমরা ওয়েট (Weight) ১০ দিচ্ছি যাতে এআই এটাকে সবথেকে বেশি গুরুত্ব দেয়
                     */
                    UserInteraction::updateOrCreate(
                        [
                            'user_id' => $userId,
                            'product_id' => $product->id,
                            'interaction_type' => 'preference'
                        ],
                        [
                            'weight' => 10,
                            'updated_at' => now()
                        ]
                    );
                }
            }

            $user = User::find($userId);
            $user->is_survey_completed = 1;
            $user->save();

            return response()->json([
                'message' => 'Your preferences have been saved! AI is now customizing your shop.',
                'user' => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong!'], 500);
        }
    }
}
