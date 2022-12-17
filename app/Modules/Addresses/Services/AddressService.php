<?php

namespace App\Modules\Addresses\Services;
 
use App\Modules\Addresses\Repository\AddressRepository;

class AddressService
{
    private $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }
    public function getAll($records = 12)
    {
        return $this->addressRepository->getAll($records);
    }
    public function createAddress($validatedRequest)
    {
        return $this->addressRepository->createAddress($validatedRequest);
    }
    public function showAddress($id)
    {
        return $this->addressRepository->getAddress($id);
    }
    public function updateAddress($validatedRequest, $id)
    {
        return $this->addressRepository->updateAddress($validatedRequest, $id);
    }
    public function deleteAddress($id)
    {
        return $this->addressRepository->deleteAddress($id);
    }
}