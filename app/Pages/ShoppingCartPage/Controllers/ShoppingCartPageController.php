<?php

namespace App\Pages\ShoppingCartPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Users\Repository\UserRepository;
use App\Pages\ShoppingCartPage\Services\ShoppingCartPageService;

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
    }
    public function saveProductforLater($cartItemId, $productId, ShoppingCartPageService $shoppingCartPageService)
    {

        $shoppingCartPageService->saveProductforLater($productId, $cartItemId);
    }

    public function increaseProductQuantity($cartItemId, ShoppingCartPageService $shoppingCartPageService)
    {
        $cartItem = $shoppingCartPageService->getCartItem($cartItemId);

        if (is_null($cartItem) || $cartItem['quantity'] > $cartItem['stock_size']) {
            return;
        }

        $shoppingCartPageService->incrementCartItemQuantity($cartItemId);
    }
    public function decreaseProductQuantity($cartItemId, ShoppingCartPageService $shoppingCartPageService)
    {
        $cartItem = $shoppingCartPageService->getCartItem($cartItemId);
        if (is_null($cartItem) || $cartItem['quantity'] == 1) {
            return;
        }

        $shoppingCartPageService->decrementCartItemQuantity($cartItemId);
    }
}