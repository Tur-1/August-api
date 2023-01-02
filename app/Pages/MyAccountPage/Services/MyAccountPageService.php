<?php

namespace App\Pages\MyAccountPage\Services;


use Exception;
use App\Modules\Addresses\Repository\AddressRepository;
use App\Modules\Addresses\Resources\AddressResource;
use App\Pages\MyAccountPage\Resources\UserInfoResource;


class MyAccountPageService
{
    private $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }
    public function getUserInformation()
    {
        return UserInfoResource::make(auth()->user());
    }
    public function getUserAddresses()
    {
        return  AddressResource::collection($this->addressRepository->getUserAddresses())->resolve();
    }
    public function createAddress($validatedRequest)
    {
        return  AddressResource::make($this->addressRepository->createAddress($validatedRequest))->resolve();
    }

    public function destroyUserAddress($address_id)
    {
        return $this->addressRepository->deleteAddress($address_id);
    }

    public function updateAddress($validatedRequest, $address_id)
    {
        return  $this->addressRepository->updateAddress($validatedRequest, $address_id);
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
        $user =  auth()->user()->update($information);

        return UserInfoResource::make($user);
    }
}