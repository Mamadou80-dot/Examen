<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;

// Auth Routes
// Redirect to login page as default page
Route::get('/', function () {
    return redirect('register');
});

Route::get('register', [AuthController::class, 'registerForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('saveregister');

Route::get('login', [AuthController::class, 'loginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Route
Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// User Routes
Route::resource('users', UserController::class)->middleware('auth');

// Client Routes
Route::resource('clients', ClientController::class)->middleware('auth');

// Product Routes
Route::resource('products', ProductController::class)->middleware('auth');

// Order Routes
Route::resource('orders', OrderController::class)->middleware('auth');

// File Download Routes
Route::get('download-client-pdf', [FileController::class, 'downloadClientPDF'])->middleware('auth')->name('download.client.pdf');
Route::get('download-product-excel', [FileController::class, 'downloadProductExcel'])->middleware('auth')->name('download.product.excel');
Route::resource('categories', CategoryController::class);
 Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
    // Autres routes liées au panier et au checkout;
Route::post('/orders/{order}/validate', 'OrderController@validateOrder')->name('orders.validate');
Route::middleware('auth')->group(function () {
    Route::post('/cart/{product}', 'CartController@add')->name('cart.add');
    Route::delete('/cart/{cart}', 'CartController@remove')->name('cart.remove');
    Route::get('/cart', 'CartController@index')->name('cart.index');
});


// You might add more specific routes here if needed.
// For example, a route for changing user passwords, or a route for filtering products by category.
