<?php

namespace App\Modules\Roles\Models;

use App\Modules\Roles\EloquentBuilders\RoleBuilder;
use App\Modules\Roles\Traits\RoleTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    use RoleTrait;

    protected $fillable = [
        'name',
        'slug',
        'page_name'
    ];


    public function newEloquentBuilder($query): RoleBuilder
    {
        return new RoleBuilder($query);
    }
}
