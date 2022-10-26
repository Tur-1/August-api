<?php

namespace App\Models\Address\Repository;

use App\Models\Address\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class AddressRepository
{

    // private $address;

    // public function __construct(Address $address)
    // {
    //     $this->address = $address;
    // }
    /**
     * Get All Address Models 
     *  
     * @return Collection
     */
    public function getUserAddresses()
    {
        return  auth()->user()->addresses;
    }

    /**
     * find address by id
     * @param int model Id 
     * @return Collection
     */
    public function findUserAddress($address_id)
    {
        return  auth()->user()->addresses->find($address_id);
    }
    public function createAddress($request)
    {
        return  auth()->user()->addresses()->create($request);
    }

    public function updateUserAddress($request, $address_id)
    {
        return  auth()->user()->addresses()->where('id', $address_id)->update($request);
    }
}