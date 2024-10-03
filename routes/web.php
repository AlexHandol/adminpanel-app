<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageNavigationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Dashboard Route
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Account Route
Route::get('/accounts', [AccountController::class, 'index'])->name('accounts.index');
Route::get('/accounts/view/{account}', [AccountController::class, 'show'])->name('accounts.view.show');
Route::get('/accounts/edit/{account}', [AccountController::class, 'edit'])->name('accounts.view.edit');
Route::put('/accounts/view/{account}', [AccountController::class, 'update'])->name('accounts.view.update');
Route::delete('/accounts/{account}', [AccountController::class, 'destroy'])->name('accounts.destroy');

// Registration Route
Route::get('/registration', [AccountController::class, 'register'])->name('registration');
Route::post('/registration', [AccountController::class, 'store'])->name('accounts.store');

// PAGE NAVIGATIONS
// Route::get('/registration', [PageNavigationController::class, 'registrationNav'])->name('registration');