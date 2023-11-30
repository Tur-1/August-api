<?php

use App\Pages\Frontend\HomePage\Controllers\HomePageController;
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



Route::controller(HomePageController::class)->group(function () {


    Route::get('/home-items', 'getBanners');
    Route::get('/home-latest-products', 'getLatestProducts');
});
