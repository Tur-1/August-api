<?php

use App\Pages\Admin\CategoriesPage\Controllers\CategoryController;
use App\Pages\Admin\CategoriesPage\Controllers\SectionController;
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


Route::controller(CategoryController::class)->group(function () {

    // get all categories 
    Route::get('/categories', 'getAllCategories');

    // get all categories by section id
    Route::get('/categories/{section_id}/sections', 'getAllCategoriesBySection');


    // store new category
    Route::post('/categories/store', 'storeCategory');

    // show category
    Route::post('/categories/show/{id}', 'showCategory');

    // update category
    Route::post('/categories/update/{id}', 'updateCategory');

    // delete category
    Route::post('/categories/delete/{id}', 'destroyCategory');
});


Route::controller(SectionController::class)->group(function () {


    // get all sections 
    Route::get('/categories/sections', 'getSections');

    // store new section
    Route::post('/categories/sections/store', 'storeNewSection');

    // delete category
    Route::post('/categories/sections/{id}/update', 'updateSection');
});