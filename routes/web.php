<?php

use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminHomepageController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactPageController;
use App\Http\Controllers\AdminEditHomepageInformationController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'lang'], function() {
    Route::get('lang/{lang}', \App\Http\Controllers\LanguageController::class)->name('lang');
    // Normal routes
    Route::get('', HomepageController::class)->name('home');
    Route::get('gallery', GalleryController::class)->name('gallery.index');
    Route::get('contact', [ContactPageController::class, 'index'])->name('contact.index');
    Route::post('contact', [ContactPageController::class, 'sendEmail'])->name('contact.send-email');
    Route::get('events', \App\Http\Controllers\EventPageController::class)->name('events.index');
    Route::resource('products', ProductController::class,
        ['only' => ['index', 'show']]
    );

    Route::resource('checkout/products', \App\Http\Controllers\ProductCheckoutController::class,
        ['only' => ['show', 'store'], 'as' => 'checkout',]
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
        Route::delete('products/additional-image/{productAdditionalImage}',
            \App\Http\Controllers\DeleteAdditionalProductImageController::class
        )->name('admin.additional-image.delete');

        Route::resource('homepage',
            AdminEditHomepageInformationController::class, [
                'as' => 'admin',
            ]);

        Route::resource('events', AdminEventController::class, [
            'as' => 'admin',
        ]);
    });
});





