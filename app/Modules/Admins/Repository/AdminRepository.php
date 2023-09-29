<?php

namespace App\Modules\Admins\Repository;

use App\Modules\Admins\Models\Admin;
use App\Exceptions\PageNotFoundException;
use App\Modules\Admins\Interface\AdminRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AdminRepository implements AdminRepositoryInterface
{
    private $admin;

    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }
    public function getAllAdmins($request): LengthAwarePaginator
    {
        return $this->admin->query()
            ->withRoleName()
            ->search($request->input('search'))
            ->paginate(12)
            ->appends($request->all());
    }
    public function createAdmin($validatedRequest): Admin
    {

        $admin = $this->admin->create($validatedRequest);

        $admin->permissions()->sync($validatedRequest['permissions_id']);

        return $admin;
    }
    public function getAdminWithPermissionsIds(int $id): Admin
    {

        $this->admin = $this->admin->WithPermissionsId()->find($id);
        if (is_null($this->admin)) {
            throw new PageNotFoundException();
        }

        return $this->admin;
    }
    public function findAdminById(int $id): Admin
    {
        $this->admin = $this->admin->find($id);
        if (is_null($this->admin)) {
            throw new PageNotFoundException();
        }

        return $this->admin;
    }
    public function updateAdmin($validatedRequest, int $id): Admin
    {
        $admin = $this->findAdminById($id);
        $admin->update($validatedRequest);
        $admin->permissions()->sync($validatedRequest['permissions_id']);
        $admin->load('permissions');

        return  $admin;
    }
    public function deleteAdmin(int $id): void
    {
        $admin = $this->findAdminById($id);

        $admin->delete();
    }
}
