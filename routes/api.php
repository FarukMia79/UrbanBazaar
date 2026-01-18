<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\FrontEnd\Auth\UserAuthController;


Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/register', [UserAuthController::class, 'register']);


Route::middleware('auth:sanctum')->group(function () {
    
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::middleware('is_admin')->group(function() {
        Route::post('/admin/logout', [AdminAuthController::class, 'logout']);
    });

});