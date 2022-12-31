<?php

use App\Pages\ShopPage\Controllers\ShopPageController;
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

    Route::get('/get-all-categories', 'getAllCategories')->name('getAllCategories');
    Route::get('/get-sections', 'getSections');

    Route::get('/shop/{category_slug?}', 'categoryPage')->name('categoryPage');
});