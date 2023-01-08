<?php

use App\Modules\Addresses\Controllers\AddressController;
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


Route::controller(AddressController::class)->group(function () {

    Route::get('/addresses', 'index');
    Route::post('/addresses/store', 'storeAddress');
    Route::post('/addresses/show/{id}', 'showAddress');
    Route::post('/addresses/update/{id}', 'updateAddress');
    Route::post('/addresses/delete/{id}', 'destroyAddress');
});
