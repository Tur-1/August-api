<?php

use App\Modules\Categories\Controllers\CategoryController;
use App\Modules\Categories\Controllers\FrontEndCategoryController;

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

    Route::get('/categories', 'getAllSectionsWithCategories');

    Route::get('/categories/sections', 'getSections');

    Route::get('/categories/sections/{section_id}', 'getCategoriesBySection');

    Route::post('/categories/section/store', 'storeNewSection');

    Route::post('/categories/section/update/{id}', 'updateSection');

    Route::post('/categories/store', 'storeCategory');
    Route::post('/categories/show/{id}', 'showCategory');
    Route::post('/categories/update/{id}', 'updateCategory');
    Route::delete('/categories/delete/{id}', 'destroyCategory');
});