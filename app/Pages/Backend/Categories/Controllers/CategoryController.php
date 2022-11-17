<?php

namespace App\Pages\Backend\Categories\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Backend\Users\Requests\StoreUserRequest;
use App\Pages\Backend\Users\Services\UserService;

class CategoryController extends Controller
{

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        return $this->userService->getAllUsers($request->per_page);
    }


    public function store(StoreUserRequest $request)
    {
        $validatedReqeust = $request->validated();

        $this->userService->createUser($validatedReqeust);

        return response()->success([
            'message' => 'user has been created successfully'
        ]);
    }

    public function show($id)
    {
        $user = $this->userService->findUser($id);

        return response()->success($user);
    }

    public function update(StoreUserRequest $request,  $id)
    {
        $validatedReqeust = $request->validated();

        $user = $this->userService->updateUser($validatedReqeust, $id);

        return response()->success([
            'message' => 'user has been updated successfully',
            'user' =>  $user,
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