<?php

namespace App\Pages\Frontend\MyAccountPage\Services;


use Exception;

use App\Modules\Orders\Repository\OrderRepository;

use App\Pages\Frontend\MyAccountPage\Resources\UserInformationResource;
use App\Pages\Frontend\MyAccountPage\Resources\OrdersListResource;
use App\Pages\Frontend\MyAccountPage\Resources\OrderShowResource;

class MyAccountPageService
{

    public function getUserInformation()
    {
        return UserInformationResource::make(auth()->user());
    }

    public function getUserOrders()
    {
        return  OrdersListResource::collection((new OrderRepository())->getUserOrders())->resolve();
    }
    public function showUserOrder($order_id)
    {


        return  OrderShowResource::make((new OrderRepository())->getUserOrder($order_id));
    }

    public function updatePhoneNumber($phoneNumber)
    {
        return auth()->user()->update(['phone_number' => intval($phoneNumber)]);
    }
    public function updatePassword($password)
    {
        auth()->user()->update(['password' => $password]);
    }
    public function updateAccountInfo($information)
    {
        $user =  auth()->user()->update($information);

        return UserInformationResource::make($user);
    }
}
