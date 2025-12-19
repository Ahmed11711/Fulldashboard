<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Notification\NotificationController;
use App\Http\Controllers\Admin\Favorite\FavoriteController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\subCategory\subCategoryController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Middleware\JwtAdminMiddleware;


Route::prefix('admin/v1')->middleware(JwtAdminMiddleware::class)->group(function () {});

Route::prefix('admin/v1')->group(function () {
    Route::apiResource('users', UserController::class)->names('user');
    Route::apiResource('categories', CategoryController::class)->names('category');
    Route::apiResource('sub_categories', subCategoryController::class)->names('sub_category');
    Route::apiResource('orders', OrderController::class)->names('order');
    Route::apiResource('favorites', FavoriteController::class)->names('favorite');
    Route::apiResource('notifications', NotificationController::class)->names('notification');
});
