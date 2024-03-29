<?php

namespace App\Pages\Admin\RolesPage\Services;

use App\Modules\Roles\Repository\RoleRepository;
use App\Pages\Admin\RolesPage\Resources\RoleResource;

class RoleService
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
    public function getAll($records = 12)
    {
        return RoleResource::collection($this->roleRepository->getAll($records));
    }
    public function getAllRoles()
    {
        return $this->roleRepository->getAllRoles();
    }
    public function getRoleWithPermissions($id)
    {
        return $this->roleRepository->getRoleWithPermissions($id);
    }
    public function getAllPermissions()
    {
        return $this->roleRepository->getAllPermissions();
    }

    public function createRole($validatedRequest)
    {
        return $this->roleRepository->createRole($validatedRequest);
    }
    public function showRole($id)
    {
        return RoleResource::make($this->roleRepository->getRole($id));
    }
    public function updateRole($validatedRequest, $id)
    {
        return RoleResource::make($this->roleRepository->updateRole($validatedRequest, $id));
    }
    public function deleteRole($id)
    {
        return $this->roleRepository->deleteRole($id);
    }
}
