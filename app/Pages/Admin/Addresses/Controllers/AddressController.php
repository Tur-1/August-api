<?php

namespace App\Modules\Addresses\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Addresses\Requests\StoreAddressRequest;
use App\Modules\Addresses\Requests\UpdateAddressRequest;
use App\Modules\Addresses\Services\AddressService;


class AddressController extends Controller
{


    private $addressService;

    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }

 
    public function index(Request $request)
    {
       return  $this->addressService->getAll();
    }

   
    public function storeAddress(StoreAddressRequest $request)
    {
        $validatedRequest = $request->validated();

        $this->addressService->createAddress($validatedRequest);
        
        return response()->success([
            'message' => 'Address has been created successfully'
        ]);
    }

    
    public function showAddress($id)
    {
        $address =  $this->addressService->showAddress($id);

        return response()->success([
            'address' => $address
        ]);
    }

 
    public function updateAddress(UpdateAddressRequest $request, $id)
    {
        $validatedRequest = $request->validated();

       $address =  $this->addressService->updateAddress($validatedRequest, $id);

       return response()->success([
           'message' => 'Address has been updated successfully',
           'address' => $address,
       ]);
    }

   
    public function destroyAddress($id)
    {
        
        $this->addressService->deleteAddress($id);

        return response()->success([
            'message' => 'Address has been deleted successfully',
        ]);
    }
}