<?php

use Illuminate\Support\Facades\Route;
use App\Pages\Frontend\WishlistPage\Controllers\WishlistPageController;
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

    Route::post('/wishlist/{product_id}/store', 'addToWishlist')->whereNumber('product_id');
});
