<?php

use App\Pages\Frontend\Auth\Controllers\GoogleSignInController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'august';
});
Route::get('oauth/google/redirect', [GoogleSignInController::class, 'redirectToGoogle']);

Route::get('oauth/google/callback', [GoogleSignInController::class, 'callback']);
