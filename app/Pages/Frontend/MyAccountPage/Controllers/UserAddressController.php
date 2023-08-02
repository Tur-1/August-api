<?php

namespace App\Pages\Frontend\MyAccountPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Frontend\MyAccountPage\Requests\StoreUserAddressRequest;
use App\Pages\Frontend\MyAccountPage\Requests\UpdateAccountPasswordRequest;
use App\Pages\Frontend\MyAccountPage\Services\UserAddressService;

class UserAddressController extends Controller
{

    private $userAddressService;


    public function __construct(UserAddressService $userAddressService)
    {

        $this->userAddressService =  $userAddressService;
    }

    public function index()
    {

        return response()->success([
            'userAddresses' => $this->userAddressService->getUserAddresses(),

        ]);
    }


    public function storeNewAddress(StoreUserAddressRequest $request)
    {

        $address = $this->userAddressService->createUserAddress($request->validated());

        return   response()->success([
            'address' => $address,
            'message' => 'new address has been added successfully',
        ]);
    }

    public function updateUserAddress(StoreUserAddressRequest $request)
    {

        $this->userAddressService->updateUserAddress($request->validated(), $request['address_id']);


        return  response()->success([
            'userAddresses' => $this->userAddressService->getUserAddresses(),
            'message' => 'address has been updated successfully'
        ]);
    }
    public function destroyUserAddress($address_id)
    {

        $this->userAddressService->destroyUserAddress($address_id);

        return  response()->success([
            'message' => 'address has been deleted successfully',
        ]);
    }
}
