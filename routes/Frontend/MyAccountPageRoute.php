<?php

use Illuminate\Support\Facades\Route;
use App\Pages\Frontend\MyAccountPage\Http\Controllers\MyAccountPageController;

Route::middleware(['auth:sanctum'])->controller(MyAccountPageController::class)->group(function () {

    // account page
    Route::get('/user-info',  'getUserInformation');

    // update account information
    Route::post('/my-account/update-info', 'updateAccountInformation')->name('updateAccountInformation');

    // update phone number
    Route::post('/my-account/update-phone-number',  'updateAccountPhoneNumber')->name('updateAccountPhoneNumber');

    // update password
    Route::post('/my-account/update-password',  'updateAccountPassword')->name('updateAccountPassword');

    // store new address
    Route::post('/my-account/new-address',  'storeNewAddress')->name('storeNewAddress');

    // update address
    Route::post('/my-account/update-address/{id}', 'updateUserAddress')->name('updateUserAddress');

    // destroy address
    Route::delete('/my-account/delete-address/{id}', 'destroyUserAddress')->name('destroyUserAddress');
});