<?php

use Illuminate\Support\Facades\Route;
use App\Pages\Frontend\Auth\Controllers\NewPasswordController;
use App\Pages\Frontend\Auth\Controllers\VerifyEmailController;
use App\Pages\Frontend\Auth\Controllers\PasswordResetLinkController;
use App\Pages\Frontend\Auth\Controllers\AuthenticatedUserController;
use App\Pages\Frontend\Auth\Controllers\EmailVerificationNotificationController;
use App\Pages\Frontend\Auth\Controllers\GoogleSignInController;

Route::middleware('guest:web')->group(function () {

    Route::post('/register', [AuthenticatedUserController::class, 'register']);

    Route::post('/login', [AuthenticatedUserController::class, 'login']);

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest:web')
        ->name('password.update');
});

Route::middleware('auth:web')->group(function () {
    Route::post('/logout', [AuthenticatedUserController::class, 'logout']);


    Route::post('/get-auth-user', [AuthenticatedUserController::class, 'getAuthenticatedUser']);


    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['throttle:6,1'])
        ->name('verification.send');
});
