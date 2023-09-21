<?php

namespace App\Pages\Admin\AdminsPage\Services;

use App\Modules\Admins\Repository\AdminRepository;
use App\Pages\Admin\AdminsPage\Resources\AdminShowResource;
use App\Pages\Admin\AdminsPage\Resources\AdminsListResource;

class AdminService
{
    private $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function getAllAdmins($request)
    {
        return AdminsListResource::collection($this->adminRepository->getAllAdmins($request));
    }

    public function createAdmin($validatedRequest)
    {
        return $this->adminRepository->createAdmin($validatedRequest);
    }

    public function getAdmin($id)
    {
        return $this->adminRepository->getAdmin($id);
    }
    public function getAdminWithPermissionsIds($id)
    {
        return AdminShowResource::make($this->adminRepository->getAdminWithPermissionsIds($id));
    }


    public function updateAdmin($validatedRequest, $id)
    {
        $admin = $this->adminRepository->updateAdmin($validatedRequest, $id);

        return AdminShowResource::make($admin);
    }

    public function deleteAdmin($id)
    {
        return $this->adminRepository->deleteAdmin($id);
    }
}
