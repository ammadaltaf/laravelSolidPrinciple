<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\DashboardController;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('orders', OrderController::class);
Route::resource('order-items', OrderItemController::class);
Route::resource('cart', CartController::class);
Route::resource('coupons', CouponController::class);
Route::resource('notifications', NotificationController::class);
Route::resource('payments', PaymentController::class);
Route::resource('reviews', ReviewController::class);
Route::resource('shipping', ShippingController::class);
Route::resource('transactions', TransactionController::class);
Route::resource('wishlists', WishlistController::class);
