<?php

namespace App\Modules\Users\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use App\Modules\Products\Models\Product;
use Illuminate\Notifications\Notifiable;
use App\Modules\ShoppingCart\Models\ShoppingCart;
use App\Modules\Users\Traits\UserAttributesTrait;
use App\Modules\Users\EloquentBuilders\UserBuilder;
use App\Modules\Users\Traits\UserRelationshipsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        UserAttributesTrait,
        UserRelationshipsTrait;

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


    public function wishlistProducts()
    {
        return $this->belongsToMany(Product::class, 'wishlists')
            ->withMainProductImage()
            ->withBrandName()
            ->active();
    }
    public function carts()
    {
        return $this->hasMany(ShoppingCart::class, 'user_id');
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
}
