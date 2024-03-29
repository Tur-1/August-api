<?php

use Illuminate\Support\Facades\Route;
use App\Pages\Admin\RolesPage\Controllers\RoleController;
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

    Route::get('/get-all-roles', 'getAllRoles');

    Route::post('/roles/store', 'storeRole');
    Route::post('/roles/show/{id}', 'showRole');
    Route::post('/roles/update/{id}', 'updateRole');
    Route::post('/roles/delete/{id}', 'destroyRole');

    Route::get('/roles/permissions', 'getAllPermissions');

    Route::get('/roles/{id}/permissions', 'getRoleWithPermissions');
});
