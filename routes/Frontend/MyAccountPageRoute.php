<?php

use App\Pages\Frontend\MyAccountPage\Controllers\MyAccountPageController;
use App\Pages\Frontend\MyAccountPage\Controllers\UserAddressController;
use Illuminate\Support\Facades\Route;


// account page



Route::middleware(['auth:sanctum'])->controller(MyAccountPageController::class)->group(function () {

    // my account page
    Route::get('/my-account', 'index');

    // update account information
    Route::post('/my-account/update-info', 'updateAccountInformation');

    // update phone number
    Route::post('/my-account/update-phone-number',  'updateAccountPhoneNumber');

    // update password
    Route::post('/my-account/update-password',  'updateAccountPassword');

    // show order 
    Route::get('/my-account/orders/{id}', 'showOrder');
});

Route::middleware(['auth:sanctum'])->controller(UserAddressController::class)->group(function () {

    // get user addresses
    Route::get('/my-account/user-addresses',  'index');

    // store new address
    Route::post('/my-account/new-address',  'storeNewAddress');

    // update address
    Route::post('/my-account/update-address', 'updateUserAddress');

    // destroy address
    Route::post('/my-account/delete-address/{id}', 'destroyUserAddress');
});
