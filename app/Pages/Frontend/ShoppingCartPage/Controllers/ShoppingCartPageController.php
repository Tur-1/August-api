<?php

namespace App\Pages\Frontend\ShoppingCartPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Users\Repository\UserRepository;
use App\Pages\Frontend\ShoppingCartPage\Actions\CartItemQuantity;
use App\Pages\Frontend\ShoppingCartPage\Services\ShoppingCartPageService;

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

            return  response()->error([
                'message' => 'try Again!'
            ]);
        }

        try {
            $this->shoppingCartPageService->moveToWishlist($cart_item_id, $product_id);
            return  response()->success([
                'message' => 'The product has been moved to your wishlist!'
            ]);
        } catch (\Exception $ex) {
            return  response()->error([
                'message' => 'try Again'
            ]);
        }
    }

    public function increaseProductQuantity($cart_item_id, CartItemQuantity $cartItemQuantity)
    {
        $cartItem = $this->shoppingCartPageService->getCartItem($cart_item_id);

        if (is_null($cartItem) || $cartItem['cart_item']['quantity'] >= $cartItem['cart_item']['size']['stock']) {
            return;
        }

        $cartItemQuantity->increment($cart_item_id);

        return  response()->success(true);
    }
    public function decreaseProductQuantity($cart_item_id, CartItemQuantity $cartItemQuantity)
    {
        $cartItem = $this->shoppingCartPageService->getCartItem($cart_item_id);
        if (is_null($cartItem) || $cartItem['cart_item']['quantity'] == 1) {
            return;
        }

        $cartItemQuantity->decrement($cart_item_id);
        return  response()->success(true);
    }
}
