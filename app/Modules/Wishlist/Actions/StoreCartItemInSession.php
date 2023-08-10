<?php

namespace App\Modules\ShoppingCart\Actions;

use Illuminate\Support\Facades\Session;

class StoreCartItemInSession
{

    public function handle($product_id, $size_id)
    {
        Session::remove('cartItem');
        Session::put('cartItem', [
            'product_id' => $product_id,
            'size_id' => $size_id
        ]);
    }
}
