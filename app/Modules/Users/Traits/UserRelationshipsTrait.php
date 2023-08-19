<?php

namespace App\Modules\Users\Traits;

use App\Modules\Roles\Models\Role;
use App\Modules\Orders\Models\Order;
use App\Modules\Products\Models\Product;
use App\Modules\Roles\Models\Permission;
use App\Modules\Users\Models\UserAddress;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait UserRelationshipsTrait
{
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'user_permissions', 'user_id', 'permission_id');
    }
    public function addresses(): HasMany
    {
        return $this->hasMany(UserAddress::class, 'user_id');
    }
    public function wishlist()
    {
        return $this->belongsToMany(Product::class, 'wishlists');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}
