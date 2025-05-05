<?php

use App\Enums\UserRole;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;

Route::group(['middleware' => ['user_role:'.UserRole::CLINIC->value], 'as' => 'clinic.', 'prefix' => 'clinic'], function () {
    Route::get('/dashboard', function () {
        return Inertia::render('clinic/dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::post('update/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::post('/', [ProductController::class, 'store'])->name('products.store');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        
    });
});
