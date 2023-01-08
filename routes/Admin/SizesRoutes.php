<?php

use App\Modules\Sizes\Controllers\SizeController;
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


Route::controller(SizeController::class)->group(function () {

    Route::get('/sizes', 'index');
    Route::get('/sizes-get-all', 'getAllSizes');


    Route::post('/sizes/store', 'storeSize');
    Route::post('/sizes/show/{id}', 'showSize');
    Route::post('/sizes/update/{id}', 'updateSize');
    Route::post('/sizes/delete/{id}', 'destroySize');
});
