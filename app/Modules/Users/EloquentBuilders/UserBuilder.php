<?php

namespace App\Modules\Users\EloquentBuilders;

use App\Modules\Roles\Models\Role;
use Illuminate\Database\Eloquent\Builder;


class UserBuilder extends Builder
{

    public function withRoleName(): self
    {
        return $this->addSelect([
            'role_name' => Role::select('name')->whereColumn('id', 'users.role_id'),
        ]);
    }

    public function search($search): self
    {
        return $this->when($search, function ($query) use ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        });
    }
}