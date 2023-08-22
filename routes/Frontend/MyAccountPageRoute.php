<?php

use App\Pages\Frontend\MyAccountPage\Controllers\MyAccountPageController;
use App\Pages\Frontend\MyAccountPage\Controllers\UserAddressController;
use Illuminate\Support\Facades\Route;


// account page



Route::middleware(['auth:sanctum'])->controller(MyAccountPageController::class)->group(function () {


    Route::get('/my-account/user-info', 'getUserInformation');

    // update account information
    Route::post('/my-account/user/update-info', 'updateUserInformation');

    // update phone number
    Route::post('/my-account/user/update-phone-number',  'updateUserPhoneNumber');

    // update password
    Route::post('/my-account/user/update-password',  'updateUserPassword');

    // update password
    Route::get('/my-account/orders', 'getUserOrders');

    // update password
    Route::get('/my-account/orders/{order_id}', 'showUserOrder');
});

Route::middleware(['auth:sanctum'])->controller(UserAddressController::class)->group(function () {

    // get user addresses
    Route::get('/my-account/user/addresses',  'getUserAddresses');

    // store new address
    Route::post('/my-account/user/addresses/store',  'storeNewAddress');

    // update address
    Route::post('/my-account/user/addresses/update', 'updateUserAddress');

    // destroy address
    Route::post('/my-account/user/addresses/{id}/delete', 'destroyUserAddress');
});
