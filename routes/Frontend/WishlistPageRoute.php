<?php

use Illuminate\Support\Facades\Route;
use App\Pages\WishlistPage\Controllers\WishlistPageController;
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



Route::controller(WishlistPageController::class)->group(function () {

    Route::get('/wishlist', 'getUserWishlist')->middleware('auth')->name('wishlistPage');

    Route::post('/wishlist/{productId}/store', 'addToWishlist')->name('addToWishlist');
});