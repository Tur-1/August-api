<?php

namespace App\Modules\Users\Repository;

use App\Modules\Addresses\Models\Address;
use App\Modules\Users\Models\UserAddress;

class UserAddressRepository
{
    public $userAddress;

    public function __construct()
    {
        $this->userAddress = new UserAddress();
    }
    public function getAll($records)
    {
        return auth()->user()->addresses()->paginate($records);
    }

    public function getUserAddresses()
    {
        return  $this->userAddress->query()->where('user_id', auth()->id())->get();
    }
    public function createAddress($validatedRequest)
    {
        return auth()->user()->addresses()->create($validatedRequest);
    }
    public function getAddress($id)
    {
        return auth()->user()->addresses()->find($id);
    }
    public function updateAddress($validatedRequest, $id)
    {
        $address = $this->getAddress($id);
        $address->update($validatedRequest);
        return  $address;
    }
    public function deleteAddress($id)
    {
        $address = $this->getAddress($id);
        return $address->delete();
    }
}
