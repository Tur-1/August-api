<?php

namespace App\Pages\Frontend\ShoppingCartPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Users\Repository\UserRepository;
use App\Pages\Frontend\ShoppingCartPage\Services\ShoppingCartPageService;

class ShoppingCartPageController extends Controller
{


    public function getShoppingCartProducts(ShoppingCartPageService $shoppingCartPageService)
    {

        return  response()->success([
            'products' =>  $shoppingCartPageService->getShoppingCartProducts(),
            'cartDetails' => $shoppingCartPageService->getCartDetails(),
        ]);
    }
    public function getCartCounter(ShoppingCartPageService $shoppingCartPageService)
    {

        return  response()->success([
            'cartCounter' =>  $shoppingCartPageService->getCartCounter(),
        ]);
    }
    public function removeCartItem($cartItemId, ShoppingCartPageService $shoppingCartPageService)
    {
        $shoppingCartPageService->removeCartItem($cartItemId);
        return  response()->success([
            'message' => 'The product has been removed from your cart!'
        ]);
    }
    public function moveToWishlist($cart_item_id, $product_id, ShoppingCartPageService $shoppingCartPageService)
    {

        if (!isset($cart_item_id) || !isset($product_id)) {

            return  response()->error([
                'message' => 'try Again!'
            ]);
        }

        try {
            $shoppingCartPageService->moveToWishlist($cart_item_id, $product_id);
            return  response()->success([
                'message' => 'The product has been moved to your wishlist!'
            ]);
        } catch (\Exception $ex) {
            return  response()->error([
                'message' => 'try Again'
            ]);
        }
    }

    public function increaseProductQuantity($cart_item_id, ShoppingCartPageService $shoppingCartPageService)
    {
        $cartItem = $shoppingCartPageService->getCartItem($cart_item_id);


        if (is_null($cartItem) || $cartItem['quantity'] >= $cartItem['stock_size']) {
            return;
        }

        $shoppingCartPageService->incrementCartItemQuantity($cart_item_id);
    }
    public function decreaseProductQuantity($cart_item_id, ShoppingCartPageService $shoppingCartPageService)
    {
        $cartItem = $shoppingCartPageService->getCartItem($cart_item_id);
        if (is_null($cartItem) || $cartItem['quantity'] == 1) {
            return;
        }

        $shoppingCartPageService->decrementCartItemQuantity($cart_item_id);
    }
}
