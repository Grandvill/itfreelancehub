<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TrackOrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/booking', [HomeController::class, 'booking'])->name('booking');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/company-profile', [HomeController::class, 'companyProfile'])->name('companyProfile');
Route::get('/track-order', [TrackOrderController::class, 'index'])->name('track.order');
Route::post('/track-order', [TrackOrderController::class, 'search'])->name('track.order.search');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/services', ServiceController::class)->names('admin.services');
    Route::resource('/bookings', BookingController::class)->names('admin.bookings');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
