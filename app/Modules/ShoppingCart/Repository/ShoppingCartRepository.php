<?php

namespace App\Modules\ShoppingCart\Repository;

use App\Modules\Products\Repository\ProductRepository;
use App\Modules\ShoppingCart\Models\ShoppingCart;

class ShoppingCartRepository
{
    private $shoppingCart;


    public function __construct()
    {
        $this->shoppingCart = new ShoppingCart();
    }

    public function getCartCount()
    {
        return   $this->shoppingCart->query()
            ->where('user_id', auth()->id())->count();
    }
    public function isExists($product_id, $size_id)
    {
        return  $this->shoppingCart->where([
            'user_id' =>  auth()->id(),
            'product_id' =>   $product_id,
            'size_id' =>  $size_id
        ])->exists('size_id');
    }
    public function storeCartItem($product_id, $size_id)
    {

        $product = (new ProductRepository())->getShoppingCartProduct($product_id);

        if (!is_null($product) && !$this->isExists($product_id, $size_id)) {
            $this->createCartItem($product_id, $size_id);
        }
    }
    public function removeCartItem($item_id)
    {
        return  $this->shoppingCart->query()
            ->where([
                'user_id' => auth()->id(),
                'id' => $item_id
            ])->delete();
    }

    public function increment($item_id)
    {
        return  $this->shoppingCart->query()
            ->where([
                'user_id' => auth()->id(),
                'id' =>  $item_id
            ])->increment('quantity', 1);
    }
    public function decrement($item_id)
    {

        return  $this->shoppingCart->query()
            ->where([
                'user_id' => auth()->id(),
                'id' =>  $item_id
            ])->decrement('quantity', 1);
    }

    private function createCartItem($product_id, $size_id)
    {
        return     $this->shoppingCart->query()
            ->where(['user_id' => auth()->id()])->create([
                'user_id' =>  auth()->id(),
                'product_id' => $product_id,
                'size_id' => $size_id,
                'quantity' => 1,
            ]);
    }
}
