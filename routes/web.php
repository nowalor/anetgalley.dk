<?php

use App\Http\Controllers\AdminHomepageController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Normal routes
Route::get('', HomepageController::class);
Route::resource('products', ProductController::class,
    ['only' => ['index', 'show']]
);

// Admin routes
Route::prefix('admin')->group(function() {
    Route::get('', AdminHomepageController::class);
    Route::resource('products', AdminProductController::class, [
        'as' => 'admin'
    ]);
});

