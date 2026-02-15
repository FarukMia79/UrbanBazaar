<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\BackEnd\Brand\BrandController;
use App\Http\Controllers\BackEnd\Category\CategoryController;
use App\Http\Controllers\BackEnd\Category\SubCategoryController;
use App\Http\Controllers\FrontEnd\Auth\UserAuthController;
use App\Http\Controllers\FrontEnd\Auth\PasswordResetController;
use GuzzleHttp\Middleware;

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/{id}', [CategoryController::class, 'show']);
Route::get('/subcategory', [SubCategoryController::class, 'index']);
Route::get('/subcategory/{id}', [SubCategoryController::class, 'show']);
Route::get('/brand', [BrandController::class, 'index']);
Route::get('/brand/{id}', [BrandController::class, 'show']);

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

    Route::middleware('is_admin')->group(function () {
        Route::post('/admin/logout', [AdminAuthController::class, 'logout']);

        Route::resource('/category', CategoryController::class)->except(['index', 'show']);
        Route::resource('/subcategory', SubCategoryController::class)->except(['index', 'show']);
        Route::resource('/brand', BrandController::class)->except(['index', 'show']);
    });
});
