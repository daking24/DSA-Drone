<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthManager::class, 'index'])->name('home');
Route::get('/dashboard', [AuthManager::class, 'dashboard'])->name('dashboard');
Route::get('/login', [AuthManager::class, 'login'])->name('view.login');
Route::post('/login', [AuthManager::class, 'loginLogic'])->name('login');
Route::get('/register', [AuthManager::class, 'showRegisterForm'])->name('view.register');
Route::post('/register', [AuthManager::class, 'register'])->name('register');

// logout
Route::post('/logout', [AuthManager::class, 'logout'])->name('logout');


