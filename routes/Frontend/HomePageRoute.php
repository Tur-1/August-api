<?php

use Illuminate\Support\Facades\Route;
use App\Pages\Frontend\Home\Http\Controllers\HomePageController;
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

// Route::view('/', 'emails.order_confirmation')->name('homePage');

Route::get('/', [HomePageController::class, 'index'])->name('homePage');
