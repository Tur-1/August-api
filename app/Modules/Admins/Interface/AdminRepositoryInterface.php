<?php

namespace App\Modules\Admins\Interface;

use App\Modules\Admins\Models\Admin;
use Illuminate\Pagination\LengthAwarePaginator;

interface AdminRepositoryInterface
{
    public function getAllAdmins($request): LengthAwarePaginator;

    public function createAdmin($validatedRequest): Admin;

    public function getAdminWithPermissionsIds(int $id): Admin;

    public function findAdminById(int $id): Admin;

    public function updateAdmin($validatedRequest, int $id): Admin;

    public function deleteAdmin(int $id): void;
}
