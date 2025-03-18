<?php

use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;



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

Route::get('/paiements', [PaymentController::class, 'index'])->name('paiements.paiement');
Route::get('/livraisons', [DeliveryController::class, 'index'])->name('livraisons.livraison');
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.review');

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



