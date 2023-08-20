<?php

use Illuminate\Support\Facades\Route;
use App\Pages\Admin\ProductsPage\Controllers\ProductController;
use App\Pages\Admin\ProductsPage\Controllers\ProductImageController;
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


Route::controller(ProductController::class)->group(function () {

    Route::get('/products', 'index');
    Route::post('/products/store', 'storeProduct');
    Route::post('/products/show/{id}', 'showProduct');

    Route::post('/products/{id}/publish/{value}', 'publishProduct');

    Route::post('/products/update/{id}', 'updateProduct');
    Route::post('/products/delete/{id}', 'destroyProduct');
});
Route::controller(ProductImageController::class)->group(function () {

    Route::post('/products/images/delete/{id}', 'destroyProductImage');
    Route::post('/products/images/update-main-image/{id}', 'updateProductMainImage');
});
