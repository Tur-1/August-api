<?php

namespace App\Pages\Frontend\ShoppingCartPage\Services;

use Exception;
use App\Exceptions\PageNotFoundException;
use App\Modules\Users\Repository\UserRepository;
use App\Modules\Wishlist\Repository\WishlistRepository;
use App\Modules\ShoppingCart\Repository\ShoppingCartRepository;
use App\Pages\Frontend\ShoppingCartPage\Resources\ShoppingCartItemsResource;

class  ShoppingCartPageService
{
    private $shoppingCartRepository;
    private $cart;
    private $cartSubTotal;
    private $shipmentFees;

    public function __construct()
    {
        $this->shoppingCartRepository = new ShoppingCartRepository();
    }

    public function getCartCounter()
    {
        return $this->shoppingCartRepository->getCartCount();
    }
    public function getShoppingCartProducts()
    {

        $this->cart = collect(
            ShoppingCartItemsResource::collection(
                (new UserRepository())->getCartProducts()
            )->resolve()
        );

        return $this->cart;
    }
    public function removeCartItem($item_id)
    {
        $this->getCartItem($item_id);

        return $this->shoppingCartRepository->removeCartItem($item_id);
    }
    public function getCartItem($item_id)
    {
        $cartItem = $this->getShoppingCartProducts()
            ->where('id', $item_id)
            ->first();
        if (is_null($cartItem)) {
            throw new PageNotFoundException();
        }
        return $cartItem;
    }
    public function increment($item_id)
    {

        return $this->shoppingCartRepository->increment($item_id);
    }
    public function decrement($item_id)
    {

        return $this->shoppingCartRepository->decrement($item_id);
    }

    public function moveToWishlist($item_id, $product_id)
    {
        $this->getCartItem($item_id);
        $wishlist = new WishlistRepository();
        if (!$wishlist->isExists($product_id)) {

            $wishlist->storeWishlistProduct($product_id);
        }

        return $this->removeCartItem($item_id);
    }
    public function deleteUserCartProducts()
    {
        return auth()->user()->shoppingCart()->detach();
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

    private function getCartSubTotal()
    {
        $this->cartSubTotal = $this->cart->sum('total_price');

        return number_format($this->cartSubTotal, 2, '.', '');
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
