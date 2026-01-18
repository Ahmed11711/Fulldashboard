<?php

use App\Http\Controllers\Admin\Blogs\BlogsController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\OrderFrontController;
use App\Http\Controllers\Front\ProfileController;
use Illuminate\Support\Facades\Route;






Route::prefix('v1')->group(function () {
    // Route::get('categories', [FrontController::class, 'categories'])->name('front.categories');


    Route::apiResource('products', ProductController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('reviews', ReviewController::class);
    Route::apiResource('blogs', BlogsController::class)->names('blogs');
    Route::apiResource('users', UserController::class);
    Route::get('settings', [SettingsController::class, 'show']);
    Route::put('settings', [SettingsController::class, 'update']);
});

Route::prefix('front')->group(function () {
    Route::get('categories', [FrontController::class, 'categories'])->name('front.categories');
    Route::get('products', [FrontController::class, 'products'])->name('front.products');
    Route::get('products/{product}', [FrontController::class, 'productDetails'])->name('front.productDetails');
    Route::post('orders', [OrderFrontController::class, 'create']);

    Route::get('articles', [FrontController::class, 'articles'])->name('front.articles');
    Route::get('articles/{article}', [FrontController::class, 'articleDetails'])->name('front.articleDetails');
});

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});
Route::prefix('user')->middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
    Route::get('myorders', [OrderFrontController::class, 'myorder']);
});
require __DIR__ . '/admin.php';
