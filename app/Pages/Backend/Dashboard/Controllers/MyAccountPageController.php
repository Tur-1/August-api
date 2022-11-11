<?php

namespace App\Pages\Frontend\MyAccountPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Frontend\MyAccountPage\Services\MyAccountPageService;
use App\Pages\Frontend\MyAccountPage\Requests\StoreUserAddressRequest;
use App\Pages\Frontend\MyAccountPage\Requests\StoreAccountInformationRequest;
use App\Pages\Frontend\MyAccountPage\Requests\UpdateAccountPasswordRequest;

class MyAccountPageController extends Controller
{

    private $myAccountService;

    public function __construct(MyAccountPageService $myAccountPageService)
    {
        $this->myAccountService =  $myAccountPageService;
    }

    public function getUserInformation()
    {

        return response()->success($this->myAccountService->getUserInformation());
    }
    public function getUserAddresses()
    {

        return response()->success($this->myAccountService->getUserAddresses());
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

        $this->myAccountService->createAddress($request->validated());

        return   response()->success([
            'message' => 'new address has been added successfully',
        ]);
    }

    public function updateUserAddress(StoreUserAddressRequest $request)
    {

        try {
            $this->myAccountService->updateAddress($request->validated(), $request['address_id']);
        } catch (\Exception $ex) {
            return  response()->error('Address Not Found', 404);
        }

        return  response()->success([
            'message' => 'address has been updated successfully'
        ]);
    }
    public function destroyUserAddress($address_id)
    {
        try {
            $this->myAccountService->destroyUserAddress($address_id);
        } catch (\Exception $ex) {
            return  response()->error('Address Not Found', 404);
        }

        return  response()->success([
            'message' => 'address has been deleted successfully',
        ]);
    }
}