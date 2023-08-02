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
});
