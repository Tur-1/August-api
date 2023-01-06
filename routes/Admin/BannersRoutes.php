<?php

use App\Modules\Banners\Controllers\BannerController;
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


Route::controller(BannerController::class)->group(function () {

    Route::get('/getAllbanners', 'index');
    Route::post('/bannersstore', 'storeBanner');
    Route::post('/bannersshow/{id}', 'showBanner');
    Route::post('/bannersupdate/{id}', 'updateBanner');
    Route::delete('/bannersdelete/{id}', 'destroyBanner');
});