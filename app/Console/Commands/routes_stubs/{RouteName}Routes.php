<?php

use {ModulePath}\Controllers\{Controller_Name}Controller;
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


Route::controller({Controller_Name}Controller::class)->group(function () {

    Route::get('/{Module}', 'index');
    Route::post('/{Module}/store', 'store{Model}');
    Route::post('/{Module}/show/{id}', 'show{Model}');
    Route::post('/{Module}/update/{id}', 'update{Model}');
    Route::post('/{Module}/delete/{id}', 'destroy{Model}');
});