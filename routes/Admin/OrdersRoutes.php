<?php

use App\Modules\Orders\Controllers\OrderController;
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


Route::controller(OrderController::class)->group(function () {

    Route::get('/orders', 'index');
    Route::post('/orders/store', 'storeOrder');
    Route::post('/orders/show/{id}', 'showOrder');
    Route::put('/orders/update/{id}', 'updateOrder');
    Route::delete('/orders/delete/{id}', 'destroyOrder');
});