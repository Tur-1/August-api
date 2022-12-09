<?php

use Illuminate\Support\Facades\Route;
use App\Pages\Frontend\Checkout\Http\Controllers\CheckoutPageController;
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



Route::middleware('auth')->controller(CheckoutPageController::class)->group(function () {


    Route::get('/checkout', 'index')->name('checkoutPage');


    Route::post('/checkout/apply-coupon', 'applyCoupon')->name('applyCoupon');

    Route::post('/checkout/buy-now', 'buyNow')->name('buyNow');
});
