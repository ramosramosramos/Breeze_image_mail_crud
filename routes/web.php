<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function(){
    Route::inertia('/','AllowedPages/Home')->name('mails.index');
    Route::get('dashboard',[DashboardController::class,'getCount'])->name('dashboard');
    Route::prefix('users')->group(function(){
        Route::resource('users',AuthController::class)->except(['updateAvatar','download']);
        Route::post('/products/products/{user}',[AuthController::class,'updateAvatar'])->name('users.updateAvatar');
        Route::get('/products/products/{user}',[AuthController::class,'download'])->name('users.download');
    });
    Route::prefix('products')->group(function(){
        Route::resource('products',ProductController::class)->except(['update']);
        Route::post('/products/products/{product}',[ProductController::class,'update'])->name('products.updateProduct');
    });
    Route::prefix('customers')->group(function(){
        Route::resource('customers',CustomerController::class)->except(['update']);
        Route::post('/customers/customers/{customer}',[CustomerController::class,'update'])->name('customers.updateCustomer');
    });
    Route::prefix('videos')->group(function(){
        Route::resource('videos',VideoController::class)->except(['update']);
        Route::post('/videos/videos/{video}',[CustomerController::class,'update'])->name('customers.updateVideo');
    });
   
});


Route::inertia('login','Auth/Login')->name('login');
Route::post('login',[LoginController::class,'store'])->name('login.store');

Route::inertia('register','Auth/Register')->name('register');
Route::post('register',[RegisterController::class,'store'])->name('register.store');
Route::post('logout',[ LogoutController::class,'store'])->name('logout.store');
