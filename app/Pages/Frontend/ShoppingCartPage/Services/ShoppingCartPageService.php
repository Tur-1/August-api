<?php

namespace App\Pages\Frontend\ShoppingCartPage\Services;

use Illuminate\Support\Facades\Session;
use App\Modules\Users\Repository\UserRepository;
use App\Modules\ShoppingCart\Models\ShoppingCart;
use App\Modules\Products\Repository\ProductRepository;
use App\Modules\ShoppingCart\Repository\ShoppingCartRepository;
use App\Modules\Wishlist\Repository\WishlistRepository;
use App\Pages\Frontend\ShopPage\Resources\ProductsListResource;
use App\Pages\Frontend\ShoppingCartPage\Resources\CartProductsResource;

class  ShoppingCartPageService
{
    private $cart;
    private $cartSubTotal;
    private $shipmentFees;

    public function getCartCounter()
    {
        return (new ShoppingCartRepository())->getCartCount();
    }
    public function getShoppingCartProducts()
    {
        $userCart =  (new UserRepository())->getCartProducts();

        $this->cart = collect(CartProductsResource::collection($userCart)->resolve());

        return $this->cart;
    }
    public function removeCartItem($item_id)
    {
        $item = $this->getCartItem($item_id);

        if (!is_null($item)) {
            return (new ShoppingCartRepository())->removeCartItem($item_id);
        }
    }
    public function getCartItem($cartItemId)
    {
        return $this->getShoppingCartProducts()
            ->where('cart_item.id', $cartItemId)
            ->first();
    }


    public function moveToWishlist($cart_item_id, $product_id)
    {

        $wishlist = new WishlistRepository();
        if (!$wishlist->isExists($product_id)) {

            $wishlist->storeWishlistProduct($product_id);
        }

        return $this->removeCartItem($cart_item_id);
    }
    public function getCartDetails()
    {

        $cartDetails = [
            'shipping_fees' =>  $this->getShipmentFees(),
            'sub_total' => $this->getCartSubTotal(),
            'total' =>    $this->getCartTotal(),
            'coupon' => null,
        ];


        return $cartDetails;
    }
    public function deleteUserCartProducts()
    {
        return auth()->user()->shoppingCart()->detach();
    }
    private function getCartSubTotal()
    {
        $this->cartSubTotal = $this->cart->sum('cart_item.total_price');

        return floatval($this->cartSubTotal);
    }

    private function getCartTotal()
    {

        $cartTotal =  $this->cartSubTotal + $this->shipmentFees;

        $cartTotal =  $this->getCartTotalWithVat($cartTotal);


        return number_format($cartTotal, 2, '.', '');
    }
    private function getShipmentFees()
    {
        $this->shipmentFees =  $this->cart->where('product.shipping_cost')->sum('product.shipping_cost');

        return $this->shipmentFees;
    }


    private function getCartTotalWithVat($cartTotal)
    {
        $vat = 15;

        $cartTotalIncludingVat = $cartTotal + ($cartTotal * $vat / 100);

        return $cartTotalIncludingVat;
    }
}
