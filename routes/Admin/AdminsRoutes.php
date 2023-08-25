<?php

use Illuminate\Support\Facades\Route;
use App\Pages\Admin\AdminsPage\Controllers\AdminController;
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


Route::controller(AdminController::class)->group(function () {

    Route::get('/admins', 'index');
    Route::post('/admins/store', 'store');
    Route::post('/admins/show/{id}', 'show');
    Route::post('/admins/update/{id}', 'update');
    Route::post('/admins/delete/{id}', 'destroy');
});
