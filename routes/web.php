<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Middleware\Auth\isLoggedInMiddleware;
use Illuminate\Support\Facades\Route;
use Laravel\Pao\Drivers\Concerns\ProfileCollector;

// Public Routes
Route::get('/', fn() => view('home'))->name('home');
Route::middleware('is-loggedIn')->group(function () {
    Route::get('/login', fn() => view('login'))->name('user.login');
    Route::get('/signup', fn() => view('signup'))->name('user.signup');
});


Route::controller(AuthController::class)->group(function () {
    Route::post('/login/store', 'login')->name('login')->middleware('throttle:6,1');
    Route::post('/signup/store', 'signup')->name('signup')->middleware('throttle:6,1');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'profilePage')->name('profile');
    Route::get('/change/password', 'UpdatePasswordPage')->name('change.password');
});