<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AnalyticsController;

// Main pages
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

// PWA offline page
Route::get('/offline', function () {
    return view('offline');
});

// Cities routes
Route::get('/cities', [CityController::class, 'index']);
Route::get('/cities/{id}', [CityController::class, 'show']);

// States and Districts routes
Route::get('/states', [StateController::class, 'index']);
Route::get('/states/{id}', [StateController::class, 'show']);
Route::get('/districts', [StateController::class, 'districts']);

// Languages routes
Route::get('/languages', [LanguageController::class, 'index']);
Route::get('/languages/{id}', [LanguageController::class, 'show']);
Route::get('/scripts', [LanguageController::class, 'scripts']);

// Analytics and Research routes
Route::get('/analytics', [AnalyticsController::class, 'dashboard']);
Route::get('/demographics', [AnalyticsController::class, 'demographics']);
Route::get('/research', [AnalyticsController::class, 'research']);
Route::get('/explore', [AnalyticsController::class, 'explore']);

// API routes for PWA functionality
Route::prefix('api')->group(function () {
    Route::get('/cities/search', [CityController::class, 'apiSearch']);
    Route::get('/states/list', [StateController::class, 'apiList']);
    Route::get('/languages/search', [LanguageController::class, 'apiSearch']);
});
