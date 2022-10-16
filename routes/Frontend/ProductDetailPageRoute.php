<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Frontend\ProductDetail\Http\Controllers\ProductDetailPageController;
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



Route::controller(ProductDetailPageController::class)->group(function () {

    Route::get('/product-detail/{product_slug}', 'index')->name('productDetailPage');

    Route::post('/product-detail/add-to-cart', 'addToShoppingCart')->name('addToShoppingCart');

    Route::post('/product-detail/{product_slug}/comment', 'sendComment')->name('sendComment');
});
