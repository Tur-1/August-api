<?php

namespace App\Modules\Roles\Repository;

use Illuminate\Support\Str;
use App\Modules\Roles\Models\Role;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Roles\Models\Permission;
use App\Exceptions\PageNotFoundException;
use App\Modules\Roles\Models\RolePermission;
use Illuminate\Database\Eloquent\Collection;

class RoleRepository
{
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }
    public function getAll($records)
    {
        return $this->role->paginate($records);
    }
    public function getAllRoles()
    {
        return $this->role->get();
    }

    public function getRolesPermissions()
    {
        return $this->role->with('permissions')->get();
    }

    public function getAllPermissions()
    {
        return Permission::query()->get()->groupBy(function ($per) {
            return $per->page_name;
        });
    }

    public function createRole($validatedRequest)
    {
        return $this->saveRole($validatedRequest, $this->role);
    }
    public function getRole($id)
    {

        $this->role = $this->role->with('permissions:id,name,page_name')->find($id);
        if (is_null($this->role)) {
            throw new PageNotFoundException();
        }

        return  $this->role;
    }
    public function getRoleWithPermissions($role_id)
    {
        $role =  $this->getRole($role_id);

        $permissions =  $role->permissions->groupBy(function ($per) {
            return $per->page_name;
        });

        return  $permissions;
    }
    private function saveRole($request, Role $role)
    {

        $role->name = Str::title($request->name);
        $role->slug = Str::slug($request->name);
        $role->save();

        $role->permissions()->sync($request->permissions);
    }
    public function updateRole($validatedRequest, $id)
    {
        $role = $this->getRole($id);
        $this->saveRole($validatedRequest, $role);

        return  $role->load('permissions');
    }
    public function deleteRole($id)
    {
        return $this->role->where('id', $id)->delete();
    }
}
