<?php

use App\Pages\MyAccountPage\Controllers\MyAccountPageController;
use Illuminate\Support\Facades\Route;


// account page

Route::middleware(['auth:sanctum'])->controller(MyAccountPageController::class)->group(function () {


    Route::get('/my-account', 'index');


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

    Route::get('/my-account/orders/{id}', 'showOrder');
});