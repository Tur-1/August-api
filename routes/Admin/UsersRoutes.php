<?php

use Illuminate\Support\Facades\Route;
use App\Pages\Admin\UsersPage\Controllers\UserController;
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


Route::controller(UserController::class)->group(function () {

    Route::get('/users', 'index');
    Route::post('/users/store', 'store');
    Route::post('/users/show/{id}', 'show');
    Route::post('/users/update/{id}', 'update');
    Route::post('/users/delete/{id}', 'destroy');
});