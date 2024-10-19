<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// LogIn Route
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');