<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TripayCallbackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home
Route::get('/', [HomeController::class, 'index']);
Route::get('/product/{product:slug}', [HomeController::class, 'product']);
Route::get('/products', [HomeController::class, 'products']);
// Akhir Home

// Login
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [LoginController::class, 'register']);
    Route::post('/register', [LoginController::class, 'store']);
    Route::post('/login', [LoginController::class, 'authenticate']);
});
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
// Akhir Login

// Transaction
Route::middleware(['auth'])->group(function () {
    Route::get('/transaction-product/{product:slug}', [TransactionController::class, 'getPayments']);
    Route::get('/transaction-detail/{reference}', [TransactionController::class, 'detail'])->name('transaction.show');
    Route::post('/transaction', [TransactionController::class, 'store'])->name('transaction.store');
});
Route::post('/transaction/callback', [TripayCallbackController::class, 'handle']);
// Akhir Transaction

// Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/transaction-detail/{reference}/{id}', [DashboardController::class, 'transactionDetail']);
    Route::get('/dashboard/change-profile/{username}', [DashboardController::class, 'changeProfile']);
    Route::post('/dashboard/change-profile/{user:id}', [DashboardController::class, 'updateProfile']);
});
// Akhir Dashboard

// Admin
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/transactions', [AdminController::class, 'transactions']);
    Route::get('/admin/transaction-detail/{reference}/{id}', [AdminController::class, 'transactionDetail']);
    Route::get('/admin/products', [AdminController::class, 'products']);
    Route::get('/admin/product-detail/{product:slug}', [AdminController::class, 'productDetail']);
    Route::get('/admin/product-edit/{product:slug}', [AdminController::class, 'editProduct']);
    Route::post('/admin/product-edit/{product:slug}', [AdminController::class, 'updateProduct']);
    Route::get('/admin/create-product', [AdminController::class, 'createProduct']);
    Route::get('/admin/create-product/checkslug', [ProductController::class, 'checkSlug']);
    Route::post('/admin/create-product', [AdminController::class, 'storeProduct']);
    Route::post('/admin/products/{product:id}', [AdminController::class, 'deleteProduct']);
});
// Akhir Admin