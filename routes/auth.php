<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::get('/isAuthenticated', [AuthenticatedSessionController::class, 'isAuthenticated']);

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');



Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');






Route::prefix('admin')->group(function () {

    Route::post('/login', [AuthenticatedSessionController::class, 'adminLogin'])->middleware('guest');

    Route::post('/logout', [AuthenticatedSessionController::class, 'adminlogout'])->middleware(['auth:admin']);

    Route::get('/get-user-permissions', [AuthenticatedSessionController::class, 'getUserPermissions']);
});
Route::post('/logout', [AuthenticatedSessionController::class, 'userLogout'])
    ->middleware(['auth:sanctum'])
    ->name('logout');
Route::post('/login', [AuthenticatedSessionController::class, 'userLogin'])
    ->middleware('guest')
    ->name('login');
