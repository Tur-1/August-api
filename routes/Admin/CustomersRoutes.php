<?php

use App\Pages\Admin\CustomersPage\Controllers\CustomerController;
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


Route::controller(CustomerController::class)->group(function () {

    Route::get('/customers', 'index');
    Route::post('/customers/store', 'store');
    Route::post('/customers/show/{id}', 'show');
    Route::post('/customers/update/{id}', 'update');
    Route::post('/customers/delete/{id}', 'destroy');
});
