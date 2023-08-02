<?php

namespace App\Pages\Admin\UsersPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Admin\UsersPage\Requests\StoreUserRequest;
use App\Pages\Admin\UsersPage\Requests\UpdateUserRequest;
use App\Pages\Admin\UsersPage\Services\UserService;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        return $this->userService->getAllUsers($request);
    }

    public function store(StoreUserRequest $request)
    {
        $request->validated();

        $this->userService->createUser($request);

        return response()->success([
            'message' => 'user has been created successfully',
        ]);
    }

    public function show($id)
    {
        $user = $this->userService->getUserWithPermissionsIds($id);

        return response()->success($user);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $request->validated();

        $user = $this->userService->updateUser($request, $id);

        return response()->success([
            'message' => 'user has been updated successfully',
            'user' => $user,
        ]);
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);

        return response()->success([
            'message' => 'user has been deleted successfully',
        ]);
    }
}
