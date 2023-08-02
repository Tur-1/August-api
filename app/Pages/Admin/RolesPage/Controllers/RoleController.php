<?php

namespace App\Pages\Admin\RolesPage\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pages\Admin\RolesPage\Requests\StoreRoleRequest;
use App\Pages\Admin\RolesPage\Requests\UpdateRoleRequest;
use App\Pages\Admin\RolesPage\Services\RoleService;


class RoleController extends Controller
{


    private $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }


    public function index(Request $request)
    {
        return  $this->roleService->getAll();
    }
    public function getAllRoles()
    {
        return  $this->roleService->getAllRoles();
    }
    public function getAllPermissions()
    {
        return  $this->roleService->getAllPermissions();
    }
    public function getRolePermissions($role_id)
    {
        return  $this->roleService->getRolePermissions($role_id);
    }


    public function storeRole(StoreRoleRequest $request)
    {
        $validatedRequest = $request->validated();

        $this->roleService->createRole($request);

        return response()->success([
            'message' => 'Role has been created successfully'
        ]);
    }


    public function showRole($id)
    {
        $role =  $this->roleService->showRole($id);


        return response()->success([
            'role' => $role
        ]);
    }


    public function updateRole(UpdateRoleRequest $request, $id)
    {
        $validatedRequest = $request->validated();

        $role =  $this->roleService->updateRole($request, $id);

        return response()->success([
            'message' => 'Role has been updated successfully',
            'role' => $role,
        ]);
    }


    public function destroyRole($id)
    {

        $this->roleService->deleteRole($id);

        return response()->success([
            'message' => 'Role has been deleted successfully',
        ]);
    }
}