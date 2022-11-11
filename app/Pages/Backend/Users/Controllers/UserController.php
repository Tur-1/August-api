<?php

namespace App\Pages\Backend\Users\Controllers;

use App\Http\Controllers\Controller;
use App\Pages\Backend\Users\Requests\StoreUserRequest;
use App\Pages\Backend\Users\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getAllUsers()
    {
        return $this->userService->getAllUsers();
    }
    public function createUser(StoreUserRequest $request)
    {
        $validatedReqeust = $request->validated();

        $this->userService->createUser($validatedReqeust);

        return response()->success([
            'message' => 'user has been created successfully'
        ]);
    }
    public function getUser($id)
    {


        $user = $this->userService->getUser($id);

        return response()->success($user);
    }
}