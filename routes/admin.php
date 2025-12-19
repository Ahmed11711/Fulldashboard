<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\JwtAdminMiddleware;


Route::prefix('admin/v1')->middleware(JwtAdminMiddleware::class)->group(function () {});
