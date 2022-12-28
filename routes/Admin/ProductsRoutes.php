<?php

use App\Modules\Products\Controllers\ProductController;
use App\Modules\Products\Controllers\ProductImageController;
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


Route::controller(ProductController::class)->group(function () {

    Route::get('/products', 'index');
    Route::post('/products/store', 'storeProduct');
    Route::post('/products/show/{id}', 'showProduct');

    Route::post('/products/publish/{id}', 'publishProduct');

    Route::post('/products/update/{id}', 'updateProduct');
    Route::delete('/products/delete/{id}', 'destroyProduct');
});
Route::controller(ProductImageController::class)->group(function () {

    Route::delete('/products/images/delete/{id}', 'destroyProductImage');
    Route::delete('/products/images/update-main-image/{id}', 'updateProductMainImage');
});