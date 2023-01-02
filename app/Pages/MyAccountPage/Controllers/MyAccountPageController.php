<?php

namespace App\Pages\MyAccountPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\MyAccountPage\Services\MyAccountPageService;
use App\Pages\MyAccountPage\Requests\StoreUserAddressRequest;
use App\Pages\MyAccountPage\Requests\UpdateAccountPasswordRequest;
use App\Pages\MyAccountPage\Requests\StoreAccountInformationRequest;

class MyAccountPageController extends Controller
{

    private $myAccountService;

    public function __construct(MyAccountPageService $myAccountPageService)
    {
        $this->myAccountService =  $myAccountPageService;
    }

    public function index()
    {

        return response()->success([
            'userAddresses' => $this->myAccountService->getUserAddresses(),
            'userInfo' => $this->myAccountService->getUserInformation(),
        ]);
    }


    public function updateAccountInformation(StoreAccountInformationRequest $request)
    {

        $user = $this->myAccountService->updateAccountInfo($request->validated());


        return response()->success([
            'user' => $user,
            'message' => 'account information has been updated successfully'
        ]);
    }
    public function updateAccountPhoneNumber(Request $request)
    {

        $request->validate(['phone_number' => 'required|digits_between:10,20|numeric']);


        $this->myAccountService->updatePhoneNumber($request->phone_number);

        return   response()->success([
            'message' => 'phone number has been updated successfully',
        ]);
    }

    public function updateAccountPassword(UpdateAccountPasswordRequest $request)
    {
        $request->validated();

        $this->myAccountService->updatePassword($request->new_password);

        return   response()->success([
            'message' => 'your password has been updated successfully',
        ]);
    }


    public function storeNewAddress(StoreUserAddressRequest $request)
    {

        $address = $this->myAccountService->createAddress($request->validated());

        return   response()->success([
            'address' => $address,
            'message' => 'new address has been added successfully',
        ]);
    }

    public function updateUserAddress(StoreUserAddressRequest $request)
    {

        $this->myAccountService->updateAddress($request->validated(), $request['address_id']);


        return  response()->success([
            'userAddresses' => $this->myAccountService->getUserAddresses(),
            'message' => 'address has been updated successfully'
        ]);
    }
    public function destroyUserAddress($address_id)
    {

        $this->myAccountService->destroyUserAddress($address_id);

        return  response()->success([
            'message' => 'address has been deleted successfully',
        ]);
    }
}