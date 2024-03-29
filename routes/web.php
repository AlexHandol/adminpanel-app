<?php

use App\Http\Controllers\CustomerController;
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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

Route::post('/registration', [CustomerController::class, 'store'])->name('customers.store');


// PAGE NAVIGATIONS
// Route::get('/customers', [PageNavigationController::class, 'customersNav']);
Route::get('/registration', [PageNavigationController::class, 'registrationNav'])->name('registration');