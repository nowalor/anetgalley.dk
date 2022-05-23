<?php

use App\Http\Controllers\AdminHomepageController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Normal routes
Route::get('', HomepageController::class);
Route::resource('products', ProductController::class,
    ['only' => ['index', 'show']]
);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('auth.show-login');
Route::post('login', [LoginController::class, 'login'])->name('auth.login');
Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');

// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('', AdminHomepageController::class);
    Route::resource('products', AdminProductController::class, [
        'as' => 'admin'
    ]);
});


