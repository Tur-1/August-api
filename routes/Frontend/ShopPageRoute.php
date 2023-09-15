<?php

use App\Pages\Frontend\ShopPage\Controllers\ShopPageController;
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


Route::controller(ShopPageController::class)->name('shop.')->group(function () {


    Route::get('/shop/category/{category_url?}', 'getCategory');

    Route::get('/shop/category/{category_url?}/products', 'getProducts');

    Route::get('/shop/category/{category_url?}/brands', 'getBrands');

    Route::get('/shop/category/{category_url?}/colors', 'getColors');

    Route::get('/shop/category/{category_url?}/sizes', 'getSizes');

    Route::get('/shop/category/{category_url?}/products/total', 'getShopPageTotalProducts');
});
