<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;

// Dashboard page
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Products CRUD
Route::resource('products', ProductController::class);

// Categories CRUD
Route::resource('categories', CategoryController::class);

// Transactions CRUD
Route::resource('transactions', TransactionController::class);
