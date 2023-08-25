<?php

namespace App\Modules\Admins\EloquentBuilders;

use App\Modules\Roles\Models\Role;
use Illuminate\Database\Eloquent\Builder;


class AdminBuilder extends Builder
{
    public function withRoleName(): self
    {
        return $this->addSelect([
            'role_name' => Role::select('name')->whereColumn('id', 'admins.role_id'),
        ]);
    }


    public function search($search): self
    {
        return $this->when($search, function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        });
    }
    public function withPermissionsId(): self
    {
        return $this->with('permissions', function ($query) {
            return $query->pluck('id')->toArray();
        });
    }
}