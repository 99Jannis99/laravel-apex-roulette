<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouletteController;
use App\Http\Controllers\AuthController;

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Profile Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/upload', [AuthController::class, 'showProfileUpload'])->name('profile.upload');
    Route::post('/profile/upload', [AuthController::class, 'uploadProfileImage'])->name('profile.upload.store');
    Route::post('/profile/skip', [AuthController::class, 'skipProfileUpload'])->name('profile.upload.skip');
});

Route::get('/', [RouletteController::class, 'index']);

// API Routes for roulette (without CSRF protection)
Route::middleware(['web'])->prefix('api')->group(function () {
    Route::get('/spin-filtered', [RouletteController::class, 'spinFiltered']);
});
