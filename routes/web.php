<?php

use Illuminate\\Support\\Facades\\Route;
use App\\Http\\Controllers\\HomeController;
use App\\Http\\Controllers\\AuthController;
use App\\Http\\Controllers\\BookingController;
use App\\Http\\Controllers\\Admin\\DashboardController;
use App\\Http\\Controllers\\Admin\\VehicleController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kendaraan/{vehicle}', [HomeController::class, 'show'])->name('vehicles.show');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [BookingController::class, 'index'])->name('dashboard');
    Route::post('/pesan/{vehicle}', [BookingController::class, 'store'])->name('bookings.store');
});
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('kendaraan', VehicleController::class);
    Route::patch('/pesanan/{booking}/status', [DashboardController::class, 'updateBooking'])->name('bookings.status');
});
