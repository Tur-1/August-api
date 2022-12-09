<?php

use App\Modules\Categories\Controllers\CategoryController;

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

    Route::get('/categories', 'index');
    Route::get('/categories/sections', 'getSections');

    Route::get('/categories/sections/{section_id}', 'getCategoriesBySection');


    Route::post('/categories/section/store', 'storeNewSection');
    Route::post('/categories/section/update/{id}', 'updateSection');


    Route::post('/categories/store', 'store');
    Route::post('/categories/show/{id}', 'show');
    Route::put('/categories/update/{id}', 'update');
    Route::delete('/categories/delete/{id}', 'destroy');
});