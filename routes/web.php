<?php

use App\Pages\Frontend\Auth\Controllers\EfarmerSignInController;
use App\Pages\Frontend\Auth\Controllers\GoogleSignInController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return config('app.name');
});
Route::get('oauth/google/redirect', [GoogleSignInController::class, 'redirectToGoogle']);

Route::get('oauth/google/callback', [GoogleSignInController::class, 'callback']);

Route::get('oauth/e-farmer/redirect', [EfarmerSignInController::class, 'redirect']);

Route::get('oauth/e-farmer/callback', [EfarmerSignInController::class, 'callback']);
