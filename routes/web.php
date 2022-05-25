<?php

use App\Http\Controllers\AdminHomepageController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactPageController;
use Illuminate\Support\Facades\Route;

// Normal routes
Route::get('', HomepageController::class)->name('home');
Route::get('gallery', GalleryController::class)->name('gallery.index');
Route::get('contact', [ContactPageController::class, 'index'])->name('contact.index');
Route::resource('products', ProductController::class,
    ['only' => ['index', 'show']]
);

// Guest routes
Route::middleware('guest')->group(function() {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('auth.show-login');
    Route::post('login', [LoginController::class, 'login'])->name('auth.login');
});

Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');

// Admin routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::get('', AdminHomepageController::class)->name('admin.index');
    Route::resource('products', AdminProductController::class, [
        'as' => 'admin'
    ]);
});


