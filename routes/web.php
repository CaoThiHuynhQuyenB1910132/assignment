<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\MyAccountController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\OrderHistoryController;
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
    Route::get('revenue-month', [DashboardController::class, 'revenue'])->name('revenue');

    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/create-user', [UserController::class, 'create'])->name('create.user');
    Route::post('/store-user', [UserController::class, 'store'])->name('store.user');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit.user');
    Route::put('/update-user/{id}', [UserController::class, 'update'])->name('update.user');
    Route::get('/delete-user/{id}', [UserController::class, 'delete'])->name('delete.user');

    Route::get('/profile/{id}', [ProfileController::class,'index'])->name('profile');
    Route::put('/update-profile/{id}', [ProfileController::class,'updateProfile'])->name('update.profile');
    Route::put('/update-password/{id}', [ProfileController::class,'updatePassword'])->name('update.password');

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

    Route::get('/order', [OrderController::class, 'index'])->name('order');
    Route::get('/edit-order/{id}', [OrderController::class, 'edit'])->name('edit.order');
    Route::put('/update-order/{id}', [OrderController::class, 'update'])->name('update.order');

});

Route::middleware(['shop-hours'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('/');

    Route::get('shop', [ShopController::class, 'index'])->name('shop');
    Route::get('wish-list', [ShopController::class, 'wishList'])->name('wishlist')->middleware('auth');

    Route::get('product-detail/{id}', [ProductDetailController::class, 'index'])->name('product.detail');
    Route::post('product-comment/{id}', [ProductDetailController::class, 'addComment'])->name('product.comment');

    Route::get('cart-detail', [CartController::class, 'index'])->name('cart.detail')->middleware('auth');
//    Route::post('cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart')->middleware('auth');

    Route::get('account/{id}', [MyAccountController::class, 'index'])->name('account')->middleware('auth');
    Route::put('update-account/{id}', [MyAccountController::class, 'updateAccount'])->name('update.account')->middleware('auth');
    Route::put('change-password-account/{id}', [MyAccountController::class, 'changePassword'])->name('change.password')->middleware('auth');
    Route::get('address-delete/{id}', [MyAccountController::class, 'deleteAddress'])->name('address.delete')->middleware('auth');

    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');
    Route::get('thank-you', [CheckoutController::class, 'thankYou'])->name('thank.you');

    Route::get('order-detail-history/{id}', [OrderHistoryController::class, 'detail'])->name('order.detail.history')->middleware('auth');
    Route::get('order-history', [OrderHistoryController::class, 'index'])->name('order.history')->middleware('auth');
    Route::get('order-cancel/{id}', [OrderHistoryController::class, 'cancel'])->name('order.cancel')->middleware('auth');
    Route::get('comment-product/{id}', [OrderHistoryController::class, 'commentOnProduct'])->name('comment.product')->middleware('auth');

});

Route::get('/coming-soon', function () {
    return view("client.comingsoon.index");
});
