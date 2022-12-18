<?php

use App\Modules\Roles\Controllers\RoleController;
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


Route::controller(RoleController::class)->group(function () {

    Route::get('/roles', 'index');

    Route::get('/roles/all', 'getAllRoles');

    Route::post('/roles/store', 'storeRole');
    Route::post('/roles/show/{id}', 'showRole');
    Route::put('/roles/update/{id}', 'updateRole');
    Route::delete('/roles/delete/{id}', 'destroyRole');

    Route::get('/roles/permissions', 'getAllPermissions');

    Route::get('/roles/{id}/permissions', 'getRolePermissions');
});