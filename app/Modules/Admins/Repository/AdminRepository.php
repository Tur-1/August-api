<?php

namespace App\Modules\Admins\Repository;

use App\Modules\Admins\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\PageNotFoundException;
use Illuminate\Database\Eloquent\Collection;

class AdminRepository
{
    private $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }
    public function getAllAdmins($request)
    {
        return $this->admin->query()
            ->withRoleName()
            ->search($request->input('search'))
            ->paginate(12)
            ->appends($request->all());
    }
    public function createAdmin($validatedRequest)
    {

        $admin = $this->admin->create($validatedRequest);

        $admin->permissions()->sync($validatedRequest['permissions_id']);
    }
    public function getAdminWithPermissionsIds($id)
    {

        $this->admin = $this->admin->WithPermissionsId()->find($id);
        if (is_null($this->admin)) {
            throw new PageNotFoundException();
        }

        return $this->admin;
    }
    public function getAdmin($id)
    {
        $this->admin = $this->admin->find($id);
        if (is_null($this->admin)) {
            throw new PageNotFoundException();
        }

        return $this->admin;
    }
    public function updateAdmin($validatedRequest, $id)
    {
        $admin = $this->getAdmin($id);
        $admin->update($validatedRequest);
        $admin->permissions()->sync($validatedRequest['permissions_id']);

        return  $admin;
    }
    public function deleteAdmin($id)
    {
        $this->admin = $this->admin->where('id', $id)->first();


        return  $this->admin->delete();
    }
}
