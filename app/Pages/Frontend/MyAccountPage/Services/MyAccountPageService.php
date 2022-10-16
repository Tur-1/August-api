<?php

namespace App\Pages\Frontend\MyAccountPage\Services;

use App\Pages\Frontend\MyAccountPage\Http\Resources\UserInfoResource;



class MyAccountPageService
{
    public  $order;
    public function getUserInformation()
    {
        return UserInfoResource::make(auth()->user());
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