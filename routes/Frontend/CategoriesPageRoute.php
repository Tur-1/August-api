<?php

use App\Modules\Frontend\Categories\Http\Controllers\CategoriesPageController;
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

    Route::get('/categories', 'index')->name('categoriesPage');
});