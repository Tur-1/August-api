<?php

use App\Pages\Admin\ReviewsPage\Controllers\ReviewController;

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


Route::controller(ReviewController::class)->group(function () {

    Route::get('/reviews', 'index');
    Route::post('/reviews/show/{id}', 'showReview');
    Route::post('/reviews/delete/{id}', 'destroyReview');
    Route::post('/reviews/show/{id}/reply', 'replyReview');
});
