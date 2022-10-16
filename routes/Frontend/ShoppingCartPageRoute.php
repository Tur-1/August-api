<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Frontend\ShoppingCart\Http\Controllers\ShoppingCartPageController;
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



Route::middleware('auth')->controller(ShoppingCartPageController::class)->group(function () {

    Route::get('/cart', 'index')->name('shoppingCartPage');



    Route::post('/increase-product-quantity/{cartItemId}', 'increaseProductQuantity')->name('increaseProductQuantity');

    Route::post('/decrease-product-quantity/{cartItemId}', 'decreaseProductQuantity')->name('decreaseProductQuantity');

    Route::delete('/remove-cart-item/{cartItemId}', 'removeCartItem')->name('removeCartItem');

    Route::post('/save-for-later/{productId}/{cartItemId}', 'saveProductforLater')->name('saveProductforLater');
    Route::post('/save-out-of-stock-for-later', 'saveOutOfStockforLater')->name('saveOutOfStockforLater');
});
