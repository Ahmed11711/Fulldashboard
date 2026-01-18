<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Favorite\FavoriteController;
use App\Http\Controllers\Admin\Notification\NotificationController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\subCategory\subCategoryController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Middleware\JwtAdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Blogs\BlogsController;



// Route::prefix('admin/v1')->middleware(JwtAdminMiddleware::class)->group(function () {});

Route::prefix('v1/admin')->group(function () {
    Route::apiResource('categories', CategoryController::class)->names('category');
});

Route::prefix('v1')->group(function () {});
