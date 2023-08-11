<?php

namespace App\Pages\Frontend\ShoppingCartPage\Actions;

use App\Modules\ShoppingCart\Models\ShoppingCart;

class CartItemQuantity
{
    public function increment($item_id)
    {
        return  ShoppingCart::query()
            ->where(['user_id' => auth()->id(), 'id' =>  $item_id])
            ->increment('quantity', 1);
    }
    public function decrement($item_id)
    {

        return  ShoppingCart::query()
            ->where(['user_id' => auth()->id(), 'id' =>  $item_id])
            ->decrement('quantity', 1);
    }
}
