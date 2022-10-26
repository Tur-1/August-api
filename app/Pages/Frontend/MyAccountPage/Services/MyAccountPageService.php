<?php

namespace App\Pages\Frontend\MyAccountPage\Services;

use App\Pages\Frontend\MyAccountPage\Http\Resources\UserAddressesResource;
use App\Pages\Frontend\MyAccountPage\Http\Resources\UserInfoResource;



class MyAccountPageService
{
    public  $order;
    public function getUserInformation()
    {
        return UserInfoResource::make(auth()->user());
    }
    public function getUserAddresses()
    {

        return  UserAddressesResource::collection(auth()->user()->addresses)->resolve();
    }
    public function findUserAddress($address_id)
    {
        return  auth()->user()->addresses->find($address_id);
    }
    public function createAddress($validatedRequest)
    {
        return  auth()->user()->addresses()->create($validatedRequest);
    }
    public function updatePhoneNumber($phoneNumber)
    {
        auth()->user()->update(['phone_number' => intval($phoneNumber)]);
    }
    public function updatePassword($password)
    {
        auth()->user()->update(['password' => $password]);
    }
    public function updateAccountInfo($information)
    {
        auth()->user()->update($information);
    }
}