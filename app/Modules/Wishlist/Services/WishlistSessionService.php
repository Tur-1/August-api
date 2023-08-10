<?php

namespace App\Modules\Wishlist\Services;

use Illuminate\Support\Facades\Session;



class WishlistSessionService
{
    public function storeProduct($product_id)
    {
        Session::put('wishlistProduct', $product_id);
    }
    public function getProduct()
    {
        return  Session::get('wishlistProduct');
    }
}
