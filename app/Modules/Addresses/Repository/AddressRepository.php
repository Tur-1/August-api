<?php

namespace App\Modules\Addresses\Repository;

use App\Modules\Addresses\Models\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class AddressRepository
{
    private $address;

    public function __construct(Address $address)
    {
        $this->address =$address;
    }
    public function getAll($records)
    {
        return $this->address->paginate($records);
    }
    public function createAddress($validatedRequest)
    {
        return $this->address->create($validatedRequest);
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
        return $this->address->where('id', $id)->delete();
    }
}