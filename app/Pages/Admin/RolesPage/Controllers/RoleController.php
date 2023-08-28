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
        $this->userCan('access-roles');
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
    public function getRoleWithPermissions($role_id)
    {
        return  $this->roleService->getRoleWithPermissions($role_id);
    }


    public function storeRole(StoreRoleRequest $request)
    {
        $this->userCan('create-roles');

        $validatedRequest = $request->validated();

        $this->roleService->createRole($request);

        return response()->success([
            'message' => 'Role has been created successfully'
        ]);
    }


    public function showRole($id)
    {
        $this->userCan('view-roles');

        $role =  $this->roleService->showRole($id);


        return response()->success([
            'role' => $role
        ]);
    }


    public function updateRole(UpdateRoleRequest $request, $id)
    {
        $this->userCan('update-roles');

        $validatedRequest = $request->validated();

        $role =  $this->roleService->updateRole($request, $id);

        return response()->success([
            'message' => 'Role has been updated successfully',
            'role' => $role,
        ]);
    }


    public function destroyRole($id)
    {
        $this->userCan('delete-roles');

        $this->roleService->deleteRole($id);

        return response()->success([
            'message' => 'Role has been deleted successfully',
        ]);
    }
}
