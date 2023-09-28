<?php

use Illuminate\Support\Facades\Route;
use App\Pages\Frontend\Auth\Controllers\NewPasswordController;
use App\Pages\Frontend\Auth\Controllers\VerifyEmailController;
use App\Pages\Frontend\Auth\Controllers\PasswordResetLinkController;
use App\Pages\Frontend\Auth\Controllers\AuthenticatedUserController;
use App\Pages\Frontend\Auth\Controllers\EmailVerificationNotificationController;




Route::post('/logout', [AuthenticatedUserController::class, 'logout'])
    ->middleware(['auth:web']);


Route::post('/login', [AuthenticatedUserController::class, 'login'])
    ->middleware('guest:web');

Route::post('/register', [AuthenticatedUserController::class, 'register'])->middleware('guest:web');




Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest:web')
    ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest:web')
    ->name('password.update');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth:web', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth:web', 'throttle:6,1'])
    ->name('verification.send');