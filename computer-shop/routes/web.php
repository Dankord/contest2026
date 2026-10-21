<?php

use App\Http\Controllers\ShopController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'index']);
Route::view('/register', 'auth.register')->middleware('guest')->name('register');
Route::post('/register', RegisterController::class)->middleware('guest');

Route::view('/login', 'auth.login')->middleware('guest')->name('login');
Route::post('/login', LoginController::class)->middleware('guest');
Route::post('/logout', LogoutController::class)->middleware('auth')->name('logout');
