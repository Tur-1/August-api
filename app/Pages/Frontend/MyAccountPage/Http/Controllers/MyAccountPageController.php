<?php

namespace App\Pages\Frontend\MyAccountPage\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Pages\Frontend\MyAccountPage\Services\MyAccountPageService;
use App\Pages\Frontend\MyAccountPage\Http\Requests\StoreUserAddressRequest;
use App\Pages\Frontend\MyAccountPage\Http\Requests\StoreAccountInformationRequest;

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

        $user = $this->myAccountService->getUserInformation();

        return response()->json($user, 200);
    }

    public function updateAccountInformation(StoreAccountInformationRequest $request)
    {

        $this->myAccountService->updateAccountInfo($request->validated());

        return $this->redirectBackWithSuccessMsg('account information has ben updated successfully');
    }
    public function updateAccountPhoneNumber(Request $request)
    {

        $request->validate(['phone_number' => 'required|digits_between:10,20|numeric']);


        $this->myAccountService->updatePhoneNumber($request->phone_number);

        return $this->redirectBackWithSuccessMsg('phone number has been updated successfully');
    }

    public function updateAccountPassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, auth()->user()->password)) {
                    $fail('current password does not match.');
                }
            }],
            'new_password' => 'required|string|min:1|same:new_password_confirmation|different:current_password',
            'new_password_confirmation' => 'required',
        ]);

        $this->myAccountService->updatePassword($request->new_password);

        return $this->redirectBackWithSuccessMsg('your password has been updated successfully');
    }


    public function storeNewAddress(StoreUserAddressRequest $request)
    {

        $this->userAddressService->createAddress($request->validated());

        return $this->redirectBackWithSuccessMsg('new address has been added successfully');
    }

    public function updateUserAddress(StoreUserAddressRequest $request,  $id)
    {
        $address = $this->userAddressService->findUserAddress($id);

        $address->update($request->validated());

        return $this->redirectBackWithSuccessMsg(' address has been updated successfully');
    }
    public function destroyUserAddress($id)
    {
        $address = $this->userAddressService->findUserAddress($id);

        $address->delete();

        return $this->redirectBackWithSuccessMsg('address has been deleted successfully');
    }
}