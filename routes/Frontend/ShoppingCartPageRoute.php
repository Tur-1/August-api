<?php

use App\Pages\ShoppingCartPage\Controllers\ShoppingCartPageController;
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
Route::middleware('auth')->controller(ShoppingCartPageController::class)->group(function () {


    Route::get('/cart', 'getShoppingCartProducts')->name('shoppingCartPage');

    Route::post('/cart/increase-item-quantity/{cartItemId}', 'increaseProductQuantity')->name('increaseProductQuantity');

    Route::post('/cart/decrease-item-quantity/{cartItemId}', 'decreaseProductQuantity')->name('decreaseProductQuantity');

    Route::post('/cart/remove-item/{cartItemId}', 'removeCartItem')->name('removeCartItem');

    Route::post('/cart/save-for-later/{cartItemId}/product/{productId}/', 'saveProductforLater')->name('saveProductforLater');
});
