<?php

use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryTagController;
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


// Route::get('/dashboard/orders', function () {
//     return view('commandes.orders');
// })->name('dashboard.orders');
Route::get('/orders', [OrdersController::class, 'index'])->name('commandes.orders');
Route::get('/client', [ClientController::class, 'index'])->name('client.client');
Route::get('/products', [ProductController::class, 'index'])->name('produits.produit');
Route::get('/parametre', [ ParametreController::class, 'index'])->name('parametres.parametre');
Route::get('/Blog', [ BlogController::class, 'index'])->name('Blog.bloge');
Route::get('/Artisan', [ ArtisanController::class, 'index'])->name('Artisans.artisan');
Route::get('/categories-tags', [CategoryTagController::class, 'index'])->name('categories-tags.category-tag');
Route::get('/paiements', [PaymentController::class, 'index'])->name('paiements.paiement');
Route::get('/livraisons', [DeliveryController::class, 'index'])->name('livraisons.livraison');
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.review');





