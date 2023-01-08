<?php

use App\Modules\Colors\Controllers\ColorController;
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

Route::controller(ColorController::class)->group(function () {
    Route::get('/colors', 'index');
    Route::get('/colors-get-all', 'getAllColors');

    Route::post('/colors/store', 'storeColor');
    Route::post('/colors/show/{id}', 'showColor');
    Route::post('/colors/update/{id}', 'updateColor');
    Route::post('/colors/delete/{id}', 'destroyColor');
});
