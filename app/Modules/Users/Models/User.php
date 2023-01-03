<?php

namespace App\Modules\Users\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use App\Modules\Roles\Models\Role;
use App\Modules\Orders\Models\Order;
use Illuminate\Support\Facades\Hash;
use App\Modules\Products\Models\Product;
use App\Modules\Roles\Models\Permission;
use Illuminate\Notifications\Notifiable;
use App\Modules\Addresses\Models\Address;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Modules\Users\EloquentBuilders\UserBuilder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'phone_number',
        'role_id'

    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'date:Y-m-d',
    ];

    public function newEloquentBuilder($query): UserBuilder
    {
        return new UserBuilder($query);
    }
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) =>  Hash::needsRehash($value) ? Hash::make($value) : $value,
        );
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions', 'user_id', 'permission_id');
    }
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
    public function wishlistHas($product_id)
    {
        return  $this->wishlist()
            ->where('product_id', $product_id)
            ->exists('product_id');
    }
    public function wishlist()
    {
        return $this->belongsToMany(Product::class, 'wishlists');
    }

    public function wishlistProducts()
    {
        return $this->belongsToMany(Product::class, 'wishlists')
            ->withMainProductImage()
            ->withBrandName()
            ->active();
    }


    public function shoppingCart()
    {
        return $this->belongsToMany(Product::class, 'shopping_carts', 'user_id', 'product_id')
            ->select('products.id')
            ->withPivot(['size_id', 'quantity', 'id'])
            ->withTimestamps();
    }
    public function shoppingCartProducts()
    {
        return $this->belongsToMany(Product::class, 'shopping_carts', 'user_id', 'product_id')
            ->withPivot(['size_id', 'quantity', 'id'])
            ->with(['sizes'])
            ->withMainProductImage()
            ->withBrandName()
            ->active();
    }
    public function shoppingCartHas($product_id, $size_id)
    {
        return  $this->shoppingCart()
            ->wherePivot('product_id',  $product_id)
            ->wherePivot('size_id', $size_id)
            ->exists('size_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}