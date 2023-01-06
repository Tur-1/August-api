<?php

use App\Pages\ProductDetailPage\Controllers\ProductDetailPageController;
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



Route::controller(ProductDetailPageController::class)->group(function () {

    Route::get('/product-detail/{product_slug}', 'getProductDetail')->name('productDetailPage');

    Route::get('/product-detail-reviews/{product_id}', 'getProductReviews')->name('ProductReviews');


    Route::post('/product-detail/add-to-cart', 'addToShoppingCart')->name('addToShoppingCart');

    Route::post('/product-detail/{product_slug}/comment', 'addComment')->name('addComment');
});