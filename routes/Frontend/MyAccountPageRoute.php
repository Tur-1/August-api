<?php

use Illuminate\Support\Facades\Route;
use App\Pages\Frontend\MyAccountPage\Http\Controllers\MyAccountPageController;

// account page

Route::middleware(['auth:sanctum'])->controller(MyAccountPageController::class)->group(function () {


    Route::get('/my-account/get-user-info', 'getUserInformation');

    Route::get('/my-account/get-user-addresses', 'getUserAddresses');

    // update account information
    Route::post('/my-account/update-info', 'updateAccountInformation');

    // update phone number
    Route::post('/my-account/update-phone-number',  'updateAccountPhoneNumber');

    // update password
    Route::post('/my-account/update-password',  'updateAccountPassword');

    // store new address
    Route::post('/my-account/new-address',  'storeNewAddress');

    // update address
    Route::post('/my-account/update-address', 'updateUserAddress');

    // destroy address
    Route::delete('/my-account/delete-address/{id}', 'destroyUserAddress');
});