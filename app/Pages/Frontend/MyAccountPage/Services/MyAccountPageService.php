<?php

namespace App\Pages\Frontend\MyAccountPage\Services;


use Exception;
use App\Models\Address\Repository\AddressRepository;
use App\Pages\Frontend\MyAccountPage\Resources\UserInfoResource;
use App\Pages\Frontend\MyAccountPage\Resources\UserAddressesResource;


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
        return  UserAddressesResource::collection($this->addressRepository->getUserAddresses())->resolve();
    }
    public function createAddress($validatedRequest)
    {
        return  $this->addressRepository->createAddress($validatedRequest);
    }
    public function findUserAddress($address_id)
    {
        return $this->addressRepository->findUserAddress($address_id);
    }
    public function destroyUserAddress($address_id)
    {
        $address = $this->addressRepository->findUserAddress($address_id);


        if (is_null($address)) {
            return throw new Exception('Address Not Found', 404);
        }
        $address->delete();
    }

    public function updateAddress($validatedRequest, $address_id)
    {

        $address = $this->addressRepository->findUserAddress($address_id);


        if (is_null($address)) {
            return  throw new Exception('Address Not Found', 404);
        }

        $this->addressRepository->updateUserAddress($validatedRequest, $address_id);
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
