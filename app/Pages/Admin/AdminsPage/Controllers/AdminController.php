<?php

namespace App\Pages\Admin\AdminsPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Admin\AdminsPage\Requests\StoreAdminRequest;
use App\Pages\Admin\AdminsPage\Requests\UpdateAdminRequest;
use App\Pages\Admin\AdminsPage\Services\AdminService;

class AdminController extends Controller
{
    private $adminService;

    public function __construct(AdminService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index(Request $request)
    {
        return $this->adminService->getAllAdmins($request);
    }

    public function store(StoreAdminRequest $request)
    {
        $validatedRequest = $request->validated();

        $this->adminService->createAdmin($validatedRequest);

        return response()->success([
            'message' => 'Admin has been created successfully',
        ]);
    }

    public function show($id)
    {
        $Admin = $this->adminService->getAdminWithPermissionsIds($id);

        return response()->success($Admin);
    }

    public function update(UpdateAdminRequest $request, $id)
    {
        $validatedRequest = $request->validated();

        $admin = $this->adminService->updateAdmin($validatedRequest, $id);

        return response()->success([
            'message' => 'Admin has been updated successfully',
            'admin' => $admin,
        ]);
    }

    public function destroy($id)
    {
        try {
            $this->adminService->deleteAdmin($id);

            return response()->success([
                'message' => 'Admin has been deleted successfully',
            ]);
        } catch (\Exception $ex) {
            return response()->error([
                'message' => 'try Again',
            ], 401);
        }
    }
}
