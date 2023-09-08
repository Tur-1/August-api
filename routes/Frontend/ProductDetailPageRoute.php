<?php

use App\Pages\Frontend\ProductDetailPage\Controllers\ProductDetailPageController;
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

    Route::get('/product-detail/{product_slug}', 'getProductDetail');

    Route::get('/product-detail/{product_id}/reviews', 'getProductReviews');

    Route::get('/product-detail/{product_id}/related-products', 'getRelatedProducts');
});

Route::middleware('auth:web')->controller(ProductDetailPageController::class)->group(function () {
    Route::post('/product-detail/add-to-cart', 'addToCart');

    Route::post('/product-detail/{product_slug}/comment', 'addComment');
});
