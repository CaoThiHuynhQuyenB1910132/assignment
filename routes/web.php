<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\MyAccountController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\OrderHistory;
use App\Http\Controllers\Client\ProductDetailController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');

Route::get('auth/{provider}/redirect', [SocialiteController::class, 'redirect'])->name('socialite.redirect');
Route::get('auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/create-user', [UserController::class, 'create'])->name('create.user');
    Route::post('/store-user', [UserController::class, 'store'])->name('store.user');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit.user');
    Route::put('/update-user/{id}', [UserController::class, 'update'])->name('update.user');
    Route::get('/delete-user/{id}', [UserController::class, 'delete'])->name('delete.user');

    Route::get('profile', [ProfileController::class,'index'])->name('profile');

    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/create-category', [CategoryController::class, 'create'])->name('create.category');
    Route::post('/store-category', [CategoryController::class, 'store'])->name('store.category');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('edit.category');
    Route::put('/update-category/{id}', [CategoryController::class, 'update'])->name('update.category');
    Route::get('/delete-category/{id}', [CategoryController::class, 'delete'])->name('delete.category');

    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::get('/create-product', [ProductController::class, 'create'])->name('create.product');
    Route::post('/store-product', [ProductController::class, 'store'])->name('store.product');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit.product');
    Route::put('/update-product/{id}', [ProductController::class, 'update'])->name('update.product');
    Route::get('/delete-product/{id}', [ProductController::class, 'delete'])->name('delete.product');
    Route::get('/delete-image/{id}', [ProductController::class, 'deleteProductImage'])->name('delete-image');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/create-contact', [ContactController::class, 'create'])->name('create.contact');
    Route::post('/store-contact', [ContactController::class, 'store'])->name('store.contact');
    Route::get('/edit-contact/{id}', [ContactController::class, 'edit'])->name('edit.contact');
    Route::put('/update-contact/{id}', [ContactController::class, 'update'])->name('update.contact');
    Route::get('/delete-contact/{id}', [ContactController::class, 'delete'])->name('delete.contact');

    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/edit-order/{id}', [OrderController::class, 'edit'])->name('edit.order');
    Route::put('/update-order/{id}', [OrderController::class, 'update'])->name('update.order');
    Route::get('/delete-order/{id}', [OrderController::class, 'delete'])->name('delete.order');

});

Route::get('/', [HomeController::class, 'index'])->name('/');

Route::get('shop', [ShopController::class, 'index'])->name('shop');

Route::get('product-detail/{id}', [ProductDetailController::class, 'index'])->name('product.detail');

Route::get('cart-detail', [CartController::class, 'index'])->name('cart.detail')->middleware('auth');
Route::post('cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart')->middleware('auth');
Route::put('cart-update', [CartController::class, 'update'])->name('cart.update')->middleware('auth');
Route::get('cart-delete/{id}', [CartController::class, 'delete'])->name('cart.delete')->middleware('auth');

Route::get('account', [MyAccountController::class, 'index'])->name('account')->middleware('auth');
Route::get('address-delete/{id}', [MyAccountController::class, 'deleteAddress'])->name('address.delete')->middleware('auth');

Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');
Route::get('thank-you', [CheckoutController::class, 'thankYou'])->name('thank.you')->middleware('auth');

Route::get('order-history', [OrderHistory::class, 'index'])->name('order.history')->middleware('auth');
Route::get('order-delete/{id}', [OrderHistory::class, 'cancle'])->name('order.delete')->middleware('auth');
