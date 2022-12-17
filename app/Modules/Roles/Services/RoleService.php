<?php

namespace App\Modules\Roles\Services;
 
use App\Modules\Roles\Repository\RoleRepository;

class RoleService
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
    public function getAll($records = 12)
    {
        return $this->roleRepository->getAll($records);
    }
    public function createRole($validatedRequest)
    {
        return $this->roleRepository->createRole($validatedRequest);
    }
    public function showRole($id)
    {
        return $this->roleRepository->getRole($id);
    }
    public function updateRole($validatedRequest, $id)
    {
        return $this->roleRepository->updateRole($validatedRequest, $id);
    }
    public function deleteRole($id)
    {
        return $this->roleRepository->deleteRole($id);
    }
}