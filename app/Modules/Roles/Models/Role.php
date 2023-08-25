<?php

namespace App\Modules\Roles\Models;

use App\Modules\Roles\EloquentBuilders\RoleBuilder;
use App\Modules\Roles\Traits\RoleTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    use RoleTrait;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function newEloquentBuilder($query): RoleBuilder
    {
        return new RoleBuilder($query);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permission', 'role_id', 'permission_id');
    }
}
