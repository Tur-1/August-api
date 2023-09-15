<?php

namespace App\Pages\Frontend\ShoppingCartPage\Controllers;

use App\Http\Controllers\Controller;
use App\Pages\Frontend\ShoppingCartPage\Services\ShoppingCartPageService;
use Illuminate\Http\Request;

class ShoppingCartPageController extends Controller
{

    public $shoppingCartPageService;

    public  function __construct(ShoppingCartPageService $shoppingCartPageService)
    {
        $this->shoppingCartPageService = $shoppingCartPageService;
    }

    public function getShoppingCartProducts()
    {

        return  response()->success([
            'cart_items' =>  $this->shoppingCartPageService->getShoppingCartProducts(),
            'cart_details' => $this->shoppingCartPageService->getCartDetails()
        ]);
    }
    public function getCartCounter()
    {

        return  response()->success([
            'cartCounter' =>  $this->shoppingCartPageService->getCartCounter(),
        ]);
    }
    public function removeCartItem($cartItemId)
    {

        $this->shoppingCartPageService->removeCartItem($cartItemId);
        return  response()->success([
            'message' => 'The product has been removed from your cart!'
        ]);
    }
    public function moveToWishlist($cart_item_id, $product_id)
    {

        if (!isset($cart_item_id) || !isset($product_id)) {
            return  response()->error('try Again!');
        }

        $this->shoppingCartPageService->moveToWishlist($cart_item_id, $product_id);
        return  response()->success([
            'message' => 'The product has been moved to your wishlist!'
        ]);
    }

    public function increaseProductQuantity($cart_item_id)
    {
        $cartItem = $this->shoppingCartPageService->getCartItem($cart_item_id);

        if (is_null($cartItem) || $cartItem['quantity'] >= $cartItem['size']['stock']) {
            return;
        }

        $this->shoppingCartPageService->increment($cart_item_id);

        return  response()->noContent();
    }
    public function decreaseProductQuantity($cart_item_id)
    {
        $cartItem = $this->shoppingCartPageService->getCartItem($cart_item_id);
        if (is_null($cartItem) || $cartItem['quantity'] == 1) {
            return;
        }

        $this->shoppingCartPageService->decrement($cart_item_id);
        return  response()->noContent();
    }
}
