<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\BackEnd\Brand\BrandController;
use App\Http\Controllers\BackEnd\Category\CategoryController;
use App\Http\Controllers\BackEnd\Category\SubCategoryController;
use App\Http\Controllers\BackEnd\Product\ColorController;
use App\Http\Controllers\BackEnd\Product\SizeController;
use App\Http\Controllers\BackEnd\Product\ProductController;
use App\Http\Controllers\FrontEnd\Auth\UserAuthController;
use App\Http\Controllers\FrontEnd\Auth\PasswordResetController;
use App\Http\Controllers\FrontEnd\CartController;
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
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/get-subcategories/{category_id}', [SubCategoryController::class, 'getSubByCategory']);

Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/user/login', [UserAuthController::class, 'login']);
Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/password/email', [PasswordResetController::class, 'sendResetLinkEmail']);
Route::post('/password/reset', [PasswordResetController::class, 'reset'])->name('password.reset');


Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/user/logout', [UserAuthController::class, 'logout']);
    Route::resource('/cart', CartController::class);

    Route::middleware('is_admin')->group(function () {
        Route::post('/admin/logout', [AdminAuthController::class, 'logout']);

        Route::resource('/category', CategoryController::class)->except(['index', 'show']);
        Route::resource('/subcategory', SubCategoryController::class)->except(['index', 'show']);
        Route::resource('/brand', BrandController::class)->except(['index', 'show']);
        Route::resource('/size', SizeController::class)->except(['index', 'show']);
        Route::resource('/color', ColorController::class)->except(['index', 'show']);
        Route::resource('/product', ProductController::class)->except(['index', 'show']);
    });
});
