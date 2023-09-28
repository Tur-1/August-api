<?php

use App\Pages\Frontend\CategoriesPage\Controllers\CategoriesPageController;
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


Route::controller(CategoriesPageController::class)->group(function () {

    Route::get('/categories', 'getSectionsWithCategories');

    Route::get('/categories/sections', 'getAllSections');


    Route::get('/categories/{category_url?}', 'getCategory');

    Route::get('/categories/{category_url?}/products', 'getProducts');

    Route::get('/categories/{category_url?}/brands', 'getBrands');

    Route::get('/categories/{category_url?}/colors', 'getColors');

    Route::get('/categories/{category_url?}/sizes', 'getSizes');

    Route::get('/categories/{category_url?}/products/total', 'getShopPageTotalProducts');
});
