<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\BackEnd\Brand\BrandController;
use App\Http\Controllers\BackEnd\Category\CategoryController;
use App\Http\Controllers\BackEnd\Category\SubCategoryController;
use App\Http\Controllers\BackEnd\Dashboard\DashboardController;
use App\Http\Controllers\BackEnd\Product\ColorController;
use App\Http\Controllers\BackEnd\Product\SizeController;
use App\Http\Controllers\BackEnd\Product\ProductController;
use App\Http\Controllers\FrontEnd\Auth\UserAuthController;
use App\Http\Controllers\FrontEnd\Auth\PasswordResetController;
use App\Http\Controllers\FrontEnd\CartController;
use App\Http\Controllers\BackEnd\Order\OrderController;
use App\Http\Controllers\BackEnd\Order\OrderItemController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\ReviewController;
use App\Http\Controllers\FrontEnd\BannerController;
use App\Http\Controllers\BackEnd\User\UserController;
use App\Http\Controllers\BackEnd\Setting\GeneralSettingController;
use GuzzleHttp\Middleware;

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);


Route::get('/subcategory', [SubCategoryController::class, 'index']);
Route::get('/subcategory/{id}', [SubCategoryController::class, 'show']);


Route::get('/brand', [BrandController::class, 'index']);
Route::get('/brand/{id}', [BrandController::class, 'show']);


Route::get('/size', [SizeController::class, 'index']);
Route::get('/size/{id}', [SizeController::class, 'show']);


Route::get('/color', [ColorController::class, 'index']);
Route::get('/color/{id}', [ColorController::class, 'show']);

Route::get('/banner', [BannerController::class, 'index']);
Route::get('/banner/{id}', [BannerController::class, 'show']);
Route::get('/banner/showBannerCat/{id}', [BannerController::class, 'showBannerCat']);


Route::get('/general/setting', [GeneralSettingController::class, 'index']);
Route::get('/general/setting/{id}', [GeneralSettingController::class, 'show']);

Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::post('/product/bulk-update', [ProductController::class, 'bulkUpdatePrice']);



Route::get('/get-subcategories/{category_id}', [SubCategoryController::class, 'getSubByCategory']);
Route::get('/personalized-recommendations', [HomeController::class, 'getPersonalizedRecommendations']);


Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/user/login', [UserAuthController::class, 'login']);
Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/password/email', [PasswordResetController::class, 'sendResetLinkEmail']);
Route::post('/password/reset', [PasswordResetController::class, 'reset'])->name('password.reset');


Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::resource('/user/admin', UserController::class);
    Route::post('/user/logout', [UserAuthController::class, 'logout']);
    Route::resource('/cart', CartController::class);
    Route::resource('/order', OrderController::class);
    Route::get('/user/orders', [OrderController::class, 'userOrders']);
    Route::post('/review/store', [ReviewController::class, 'store']);


    Route::middleware('is_admin')->group(function () {
        Route::post('/admin/logout', [AdminAuthController::class, 'logout']);

        Route::resource('/category', CategoryController::class)->except(['index', 'show']);
        Route::resource('/subcategory', SubCategoryController::class)->except(['index', 'show']);

        Route::resource('/brand', BrandController::class)->except(['index', 'show']);

        Route::resource('/size', SizeController::class)->except(['index', 'show']);

        Route::resource('/color', ColorController::class)->except(['index', 'show']);

        Route::resource('/product', ProductController::class)->except(['index', 'show']);


        Route::resource('/orderitem', OrderItemController::class);
        Route::post('/order/update-status/{id}', [OrderController::class, 'updateStatus']);


        Route::post('/banner/banner-store', [BannerController::class, 'bannerStore']);
        Route::put('/banner-update/{id}', [BannerController::class, 'bannerUpdate']);
        Route::delete('/banner/bannerCatDelete/{id}', [BannerController::class, 'bannerCatDelete']);
        Route::resource('/banner', BannerController::class)->except(['index', 'show']);

        Route::resource('/general/setting', GeneralSettingController::class)->except(['index', 'show']);

        Route::resource('/dashboard', DashboardController::class);
    });
});
