<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::get('/register', [LoginController::class, 'registerIndex'])->name('register');

Route::post('/login', [LoginController::class, 'loginPost'])->name('login.post');

Route::post('/register', [LoginController::class, 'register'])->name('register.post');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/shorten', [UrlController::class, 'shorten']);

Route::get('/form/{shortUrl}', [UrlController::class, 'redirect']);

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');
