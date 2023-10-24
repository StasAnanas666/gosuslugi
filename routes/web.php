<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;

Route::get('/home', [ServiceController::class, 'index']) -> name('home');
// Route::get('/contacts', ContactController::class);
Route::get('/order-service/{service?}', [ServiceController::class, 'order']) -> name('order_service');
Route::get('/orderPage', [ServiceController::class, 'orderPage']) -> name('order_page');
// Route::get('/reviews', ReviewController::class);
Route::get('/admin', [AdminController::class, 'index']) -> name('admin')->middleware('auth');
Route::get('/dashboard', [UserDashboardController::class, 'dashboard']) -> name('dashboard')->middleware('auth');


Route::post('/add_service', [ServiceController::class, 'store']) -> name('add_service');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
