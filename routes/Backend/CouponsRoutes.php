<?php

use App\Modules\Coupons\Controllers\CouponController;
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


Route::controller(CouponController::class)->group(function () {

    Route::get('/coupons', 'index');
    Route::post('/coupons/store', 'storeCoupon');
    Route::post('/coupons/show/{id}', 'showCoupon');
    Route::put('/coupons/update/{id}', 'updateCoupon');
    Route::delete('/coupons/delete/{id}', 'destroyCoupon');
});