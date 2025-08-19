<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouletteController;

Route::get('/', [RouletteController::class, 'index']);

// API Routes for roulette (without CSRF protection)
Route::middleware(['web'])->prefix('api')->group(function () {
    Route::get('/spin-filtered', [RouletteController::class, 'spinFiltered']);
});
