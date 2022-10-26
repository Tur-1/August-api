<?php

namespace App\Pages\Frontend\MyAccountPage\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Frontend\MyAccountPage\Services\MyAccountPageService;
use App\Pages\Frontend\MyAccountPage\Http\Requests\StoreUserAddressRequest;
use App\Pages\Frontend\MyAccountPage\Http\Requests\StoreAccountInformationRequest;
use App\Pages\Frontend\MyAccountPage\Http\Requests\UpdateAccountPasswordRequest;

class MyAccountPageController extends Controller
{

    public $genders = ['Female', 'Male'];
    private $userAddressService;
    private $myAccountService;

    public function __construct()
    {
        $this->myAccountService =  new MyAccountPageService();
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

        return response([
            'message' => 'your password has been updated successfully'
        ], 200);
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

        $address = $this->myAccountService->findUserAddress($request->address_id);

        if (is_null($address)) {
            return  response()->error('Address Not Found', 404);
        }

        $address->update($request->validated());

        return  response()->success([
            'message' => 'address has been updated successfully'
        ]);
    }
    public function destroyUserAddress($id)
    {
        $address = $this->myAccountService->findUserAddress($id);

        if (is_null($address)) {
            return  response()->error('Address Not Found', 404);
        }
        $address->delete();

        return  response()->success([
            'message' => 'address has been deleted successfully',
        ]);
    }
}