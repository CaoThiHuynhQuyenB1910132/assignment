<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\MyAccountController;
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

    Route::get('/product-image', [ProductImageController::class, 'index'])->name('product-image');
    Route::get('/create-product-image', [ProductImageController::class, 'create'])->name('create.product-image');
    Route::post('/store-product-image', [ProductImageController::class, 'store'])->name('store.product-image');
    Route::get('/edit-product-image/{id}', [ProductImageController::class, 'edit'])->name('edit.product-image');
    Route::put('/update-product-image/{id}', [ProductImageController::class, 'update'])->name('update.product-image');
    Route::get('/delete-product-image/{id}', [ProductImageController::class, 'delete'])->name('delete.product-image');

    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/create-contact', [ContactController::class, 'create'])->name('create.contact');
    Route::post('/store-contact', [ContactController::class, 'store'])->name('store.contact');
    Route::get('/edit-contact/{id}', [ContactController::class, 'edit'])->name('edit.contact');
    Route::put('/update-contact/{id}', [ContactController::class, 'update'])->name('update.contact');
    Route::get('/delete-contact/{id}', [ContactController::class, 'delete'])->name('delete.contact');

});

Route::get('/', [HomeController::class, 'index'])->name('/');

Route::get('shop', [ShopController::class, 'index'])->name('shop');

Route::get('product-detail/{id}', [ProductDetailController::class, 'index'])->name('product.detail');

Route::get('cart-detail', [CartController::class, 'index'])->name('cart.detail')->middleware('auth');
Route::post('cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart')->middleware('auth');
Route::put('cart-update', [CartController::class, 'update'])->name('cart.update')->middleware('auth');
Route::get('cart-delete/{id}', [CartController::class, 'delete'])->name('cart.delete')->middleware('auth');

Route::get('account', [MyAccountController::class, 'index'])->name('account')->middleware('auth');
