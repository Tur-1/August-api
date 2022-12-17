<?php

namespace App\Modules\Roles\Repository;

use App\Modules\Roles\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class RoleRepository
{
    private $role;

    public function __construct(Role $role)
    {
        $this->role =$role;
    }
    public function getAll($records)
    {
        return $this->role->paginate($records);
    }
    public function createRole($validatedRequest)
    {
        return $this->role->create($validatedRequest);
    }
    public function getRole($id)
    {
        return $this->role->find($id);
    }
    public function updateRole($validatedRequest, $id)
    {
        $role = $this->getRole($id);
        $role->update($validatedRequest);
        return  $role;
    }
    public function deleteRole($id)
    {
        return $this->role->where('id', $id)->delete();
    }
}