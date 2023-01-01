<?php

namespace App\Pages\WishlistPage\Services;

use Illuminate\Support\Facades\Session;
use App\Modules\Users\Repository\UserRepository;
use App\Modules\Products\Repository\ProductRepository;
use App\Pages\ShopPage\Resources\ProductsListResource;

class  WishlistPageService
{

    public $count;
    public function getUserWishlist()
    {
        $products =  ProductsListResource::collection((new UserRepository())->getUserWishlist());
        $this->count = count($products);
        return $products;
    }
    public function countWishlistProducts()
    {
        return $this->count;
    }
    public function addProductToWishlist($product_id = null)
    {
        // if (is_null($product_id)) {
        //     $wishlist = Session::get('wishlist');
        //     $product_id = $wishlist['product_id'];
        //     if (!auth()->user()->WishlistHas($product_id)) {
        //         auth()->user()->wishlist()->attach($product_id);
        //     }
        //     Session::remove('wishlist');
        //     return;
        // }


        if (!is_null($product_id)) {
            if (auth()->user()->WishlistHas($product_id)) {

                auth()->user()->wishlist()->detach($product_id);
            } else {

                auth()->user()->wishlist()->attach($product_id);
            }
        }
    }
}