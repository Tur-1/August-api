<?php

use Illuminate\Support\Facades\Route;
use App\Pages\Admin\Auth\Controllers\AuthenticatedAdminController;



Route::post('/login', [AuthenticatedAdminController::class, 'login'])->middleware('guest:admin');

Route::middleware(['auth:admin'])->group(function () {

    Route::post('/logout', [AuthenticatedAdminController::class, 'logout']);
});

Route::get('/get-admin-permissions', [AuthenticatedAdminController::class, 'getAdminPermissions']);
