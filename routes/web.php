<?php

use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CouponController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TagController;






Route::get('/', function () {
    return view('welcome');
});




Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');



Route::get('/orders', [OrdersController::class, 'index'])->name('commandes.orders');
Route::get('/client', [ClientController::class, 'index'])->name('client.client');
Route::get('/products', [ProductController::class, 'index'])->name('produits.produit');
Route::get('/parametre', [ ParametreController::class, 'index'])->name('parametres.parametre');


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.category');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

//Route pour Tags
Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
Route::get('/tags/{id}/edit', [TagController::class, 'edit'])->name('tags.edit');
Route::put('/tags/{id}', [TagController::class, 'update'])->name('tags.update');
Route::delete('/tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');

// Routes pour les sous-catégories
Route::get('/sub-categories', [SubCategoryController::class, 'index'])->name('Sub_categories.index');
Route::get('/sub-categories/create', [SubCategoryController::class, 'create'])->name('Sub_categories.create');
Route::post('/sub-categories', [SubCategoryController::class, 'store'])->name('Sub_categories.store');
Route::get('/sub-categories/{id}', [SubCategoryController::class, 'show'])->name('Sub_categories.show');
Route::get('/sub-categories/{id}/edit', [SubCategoryController::class, 'edit'])->name('Sub_categories.edit');
Route::put('/sub-categories/{id}', [SubCategoryController::class, 'update'])->name('Sub_categories.update');
Route::delete('/sub-categories/{id}', [SubCategoryController::class, 'destroy'])->name('Sub_categories.destroy');
// Route pour les coupon
Route::get('/coupons', [App\Http\Controllers\CouponController::class, 'index'])->name('coupon.index');
Route::post('/coupons', [App\Http\Controllers\CouponController::class, 'store'])->name('coupon.store');
Route::get('/coupons/{id}/edit', [App\Http\Controllers\CouponController::class, 'edit'])->name('coupon.edit');
Route::put('/coupons/{id}', [App\Http\Controllers\CouponController::class, 'update'])->name('coupon.update');
Route::delete('/coupons/{id}', [App\Http\Controllers\CouponController::class, 'destroy'])->name('coupon.destroy');
Route::post('/coupons/verify', [App\Http\Controllers\CouponController::class, 'verify'])->name('coupon.verify');
Route::get('/paiements', [PaymentController::class, 'index'])->name('paiements.paiement');
Route::get('/livraisons', [DeliveryController::class, 'index'])->name('livraisons.livraison');
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.review');
// Route pour les product
Route::get('/products', [ProductController::class, 'index'])->name('produits.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('produits.create');
Route::post('/products', [ProductController::class, 'store'])->name('produits.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('produits.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('produits.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('produits.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('produits.destroy');

Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register'); 
Route::post('/register',[RegisterController::class,'register'])->name('register');
Route::get('/forgot-password', [ResetPasswordController::class, 'showForgotPasswordForm'])->name('password.forgot.form');
Route::post('/forgot-password', [ResetPasswordController::class, 'forgotPassword'])->name('password.forgot');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetPasswordForm'])->name('password.reset.form');
Route::post('/reset-password', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');
// Route::get('/verify-token/{token}', [VotreController::class, 'verifyToken'])->name('password.verify');



