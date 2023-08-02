<?php

namespace App\Pages\Frontend\MyAccountPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Frontend\MyAccountPage\Services\MyAccountPageService;
use App\Pages\Frontend\MyAccountPage\Requests\StoreUserAddressRequest;
use App\Pages\Frontend\MyAccountPage\Requests\UpdateAccountPasswordRequest;
use App\Pages\Frontend\MyAccountPage\Requests\StoreAccountInformationRequest;
use App\Pages\Frontend\MyAccountPage\Services\UserAddressService;

class MyAccountPageController extends Controller
{

    private $myAccountService;
    private $userAddressService;


    public function __construct(MyAccountPageService $myAccountPageService, UserAddressService $userAddressService)
    {
        $this->myAccountService =  $myAccountPageService;
        $this->userAddressService =  $userAddressService;
    }

    public function index()
    {

        return response()->success([
            'userInfo' => $this->myAccountService->getUserInformation(),
            'orders' =>  $this->myAccountService->getUserOrders(),
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

    public function showOrder($id)
    {
        $order = $this->myAccountService->getUserOrderDetail($id);

        return response()->success([
            'order' => $order,
        ]);
    }
}
