<?php

namespace App\Modules\Wishlist\Repository;

use App\Modules\Wishlist\Models\Wishlist;

class WishlistRepository
{
    private $wishlist;


    public function __construct()
    {
        $this->wishlist = new Wishlist();
    }

    public function getWishlistProductsIds()
    {
        return  $this->wishlist->query()
            ->where(['user_id' => auth('web')->id()])
            ->pluck('product_id')
            ->toArray();
    }
    public function getWishlistProducts()
    {
        return $this->wishlist->with('products')->get();
    }
    public function isExists($product_id)
    {
        return  $this->wishlist->where([
            'user_id' =>  auth()->id(),
            'product_id' =>   $product_id,
        ])->exists('product_id');
    }

    public function storeWishlistProduct($product_id)
    {
        $this->wishlist->query()
            ->where(['user_id' => auth()->id()])
            ->create([
                'user_id' => auth()->id(),
                'product_id' => intval($product_id),
            ]);
    }

    public function removeWishlistProduct($product_id)
    {
        $this->wishlist->query()
            ->where([
                'user_id' => auth()->id(),
                'product_id' => $product_id
            ])->delete();
    }
}
