<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Frontend\Shop\Http\Controllers\ShopPageController;
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

    Route::get('/categories', 'categoriesPage')->name('shopPage');

    Route::get('/shop/{category_slug?}', 'categoryPage')->name('categoryPage');
    Route::post('/shop/search', 'searchProducts')->name('searchProducts');
});