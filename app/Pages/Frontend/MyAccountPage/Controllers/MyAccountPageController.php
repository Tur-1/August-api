<?php

namespace App\Pages\Frontend\MyAccountPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Frontend\MyAccountPage\Services\MyAccountPageService;
use App\Pages\Frontend\MyAccountPage\Requests\UpdateUserPasswordRequest;
use App\Pages\Frontend\MyAccountPage\Requests\StoreUserInformationRequest;

class MyAccountPageController extends Controller
{

    private $myAccountService;


    public function __construct(MyAccountPageService $myAccountPageService)
    {
        $this->myAccountService =  $myAccountPageService;
    }


    public function getUserOrders()
    {
        return response()->success($this->myAccountService->getUserOrders());
    }
    public function showUserOrder($order_id)
    {
        $order = $this->myAccountService->showUserOrder($order_id);

        return response()->success($order);
    }
    public function updateUserInformation(StoreUserInformationRequest $request)
    {

        $validatedRequest =  $request->validated();

        $user = $this->myAccountService->updateAccountInfo($validatedRequest);


        return response()->success([
            'user' => $user,
            'message' => 'account information has been updated successfully'
        ]);
    }


    public function updateUserPhoneNumber(Request $request)
    {

        $request->validate(['phone_number' => 'required|digits_between:9,10|numeric']);

        $this->myAccountService->updatePhoneNumber($request->phone_number);

        return   response()->success([
            'message' => 'phone number has been updated successfully',
        ]);
    }

    public function updateUserPassword(UpdateUserPasswordRequest $request)
    {
        $request->validated();

        $this->myAccountService->updatePassword($request->new_password);

        return   response()->success([
            'message' => 'your password has been updated successfully',
        ]);
    }
}
