<?php

namespace App\Pages\Frontend\MyAccountPage\Services;

use App\Pages\Frontend\MyAccountPage\Resources\UserAddressResource;
use App\Modules\Users\Repository\UserAddressRepository;


class UserAddressService
{
    private $userAddressRepository;

    public function __construct(UserAddressRepository $userAddressRepository)
    {
        $this->userAddressRepository = $userAddressRepository;
    }

    public function getUserAddresses()
    {
        return  UserAddressResource::collection($this->userAddressRepository->getUserAddresses())->resolve();
    }

    public function createUserAddress($validatedRequest)
    {
        return  UserAddressResource::make($this->userAddressRepository->createAddress($validatedRequest))->resolve();
    }


    public function updateUserAddress($validatedRequest, $address_id)
    {
        return  $this->userAddressRepository->updateAddress($validatedRequest, $address_id);
    }

    public function destroyUserAddress($address_id)
    {
        return $this->userAddressRepository->deleteAddress($address_id);
    }
}
