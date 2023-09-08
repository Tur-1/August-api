<?php

use App\Pages\Frontend\ShoppingCartPage\Controllers\ShoppingCartPageController;
use Illuminate\Support\Facades\Route;
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


Route::controller(ShoppingCartPageController::class)->group(function () {


    Route::get('/cart/count', 'getCartCounter')->name('getCartCounter');
});
Route::middleware('auth:web')->controller(ShoppingCartPageController::class)->group(function () {


    Route::get('/cart', 'getShoppingCartProducts')->name('shoppingCartPage');

    Route::post('/cart/increase-item-quantity/{cart_item_id}', 'increaseProductQuantity');

    Route::post('/cart/decrease-item-quantity/{cart_item_id}', 'decreaseProductQuantity');

    Route::post('/cart/remove-item/{cart_item_id}', 'removeCartItem');

    Route::post('/cart/move-to-wishlist/{cart_item_id}/product/{product_id}/', 'moveToWishlist');
});
