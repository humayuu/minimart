<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', fn() => view('home'))->name('home');
Route::get('/login', fn() => view('login'))->name('user.login');
Route::get('/signup', fn() => view('signup'))->name('user.signup');


Route::controller(AuthController::class)->group(function () {
    Route::post('/login/store', 'login')->name('login')->middleware('throttle:6,1');
    Route::post('/signup/store', 'signup')->name('signup')->middleware('throttle:6,1');
    Route::post('/logout', 'logout')->name('logout');
});