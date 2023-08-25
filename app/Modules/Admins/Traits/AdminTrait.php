<?php

namespace App\Modules\Admins\Traits;

use App\Modules\Roles\Models\Permission;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait AdminTrait
{
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'admin_permission', 'admin_id', 'permission_id');
    }
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) =>  Hash::needsRehash($value) ? Hash::make($value) : $value,
        );
    }
}
