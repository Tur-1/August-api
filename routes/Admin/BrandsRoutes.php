<?php


use Illuminate\Support\Facades\Route;
use App\Pages\Admin\BrandsPage\Controllers\BrandController;

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

Route::controller(BrandController::class)->group(function () {
    Route::get('/brands', 'index');
    Route::get('/brands-get-all', 'getAllBrands');

    Route::post('/brands/store', 'storeBrand');
    Route::post('/brands/show/{id}', 'showBrand');
    Route::post('/brands/update/{id}', 'updateBrand');
    Route::post('/brands/delete/{id}', 'destroyBrand');
});
