<?php

use Illuminate\Support\Facades\Route;
use App\Pages\Admin\Auth\Controllers\LoginContoller;
use App\Pages\Admin\Auth\Controllers\LogoutContoller;

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



Route::middleware('guest')->post('/login', LoginContoller::class);

Route::middleware(['auth:sanctum'])->post('/logout', LogoutContoller::class);
