<?php

namespace App\Modules\Addresses\Repository;

use App\Modules\Addresses\Models\Address;
use App\Modules\Addresses\Resources\AddressResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class AddressRepository
{
    private $address;
    public $userAddresses;

    public function __construct()
    {

        $this->address = new Address();
    }
    public function getAll($records)
    {
        return $this->address->paginate($records);
    }

    public function getUserAddresses()
    {
        $this->userAddresses = auth()->user()->addresses;
        return $this->userAddresses;
    }
    public function createAddress($validatedRequest)
    {
        return auth()->user()->addresses()->create($validatedRequest);
    }
    public function getAddress($id)
    {
        return $this->address->find($id);
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