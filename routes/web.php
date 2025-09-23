<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;

// Home Page
Route::get('/', function () {
    return view('home');
});

// About Page
Route::get('/about', function () {
    return view('about');
});

// Cities Page (using controller)
Route::get('/cities', [CityController::class, 'index']);

// Individual City Page
Route::get('/cities/{id}', [CityController::class, 'show']);

// Contact Page
Route::get('/contact', function () {
    return view('contact');
});
