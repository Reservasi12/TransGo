<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BlogPublicController;
use App\Http\Controllers\InfographicController;

// Guest Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [BlogPublicController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogPublicController::class, 'show'])->name('blog.show');
Route::get('/infographic', [InfographicController::class, 'index'])->name('infographic');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

// User Routes
Route::middleware(['auth', 'user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('reservations', \App\Http\Controllers\User\ReservationController::class);
    Route::get('/checkin', [\App\Http\Controllers\User\CheckInController::class, 'index'])->name('checkin.index');
    Route::post('/checkin', [\App\Http\Controllers\User\CheckInController::class, 'process'])->name('checkin.process');
    Route::resource('cancellations', \App\Http\Controllers\User\CancellationController::class)->only(['index', 'create', 'store']);
    Route::get('/profile', [\App\Http\Controllers\User\ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [\App\Http\Controllers\User\ProfileController::class, 'update'])->name('profile.update');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    // User Management - Only for Super Admin (admin role, not staff)
    Route::middleware('superadmin')->group(function () {
        Route::resource('users', \App\Http\Controllers\Admin\UserManagementController::class);
    });
    
    Route::resource('transport-services', \App\Http\Controllers\Admin\TransportServiceController::class);
    Route::patch('/reservations/{reservation}/update-status', [\App\Http\Controllers\Admin\ReservationManagementController::class, 'updateStatus'])->name('reservations.update-status');
    Route::get('/reservations/{reservation}/update-status', function ($reservation) { return redirect()->route('admin.reservations.show', $reservation); });
    Route::resource('reservations', \App\Http\Controllers\Admin\ReservationManagementController::class)->only(['index', 'show']);
    Route::resource('cancellations', \App\Http\Controllers\Admin\CancellationManagementController::class)->only(['index', 'show', 'update']);
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class);
    Route::get('/activity-logs', [\App\Http\Controllers\Admin\ActivityLogController::class, 'index'])->name('activity-logs.index');
});
