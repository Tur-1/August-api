<?php

namespace App\Modules\Roles\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Roles\Requests\StoreRoleRequest;
use App\Modules\Roles\Requests\UpdateRoleRequest;
use App\Modules\Roles\Services\RoleService;


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

   
    public function storeRole(StoreRoleRequest $request)
    {
        $validatedRequest = $request->validated();

        $this->roleService->createRole($validatedRequest);
        
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

       $role =  $this->roleService->updateRole($validatedRequest, $id);

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