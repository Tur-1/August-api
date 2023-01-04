<?php

namespace App\Pages\ShoppingCartPage\Services;

use Illuminate\Support\Facades\Session;
use App\Modules\Products\Models\ShoppingCart;
use App\Modules\Users\Repository\UserRepository;
use App\Modules\Products\Repository\ProductRepository;
use App\Pages\ShopPage\Resources\ProductsListResource;
use App\Pages\ShoppingCartPage\Resources\CartProductsResource;

class  ShoppingCartPageService
{
    private $cart;
    private $cartSubTotal;
    private $shipmentFees;

    public function getCartCounter()
    {
        return app('cartCounter');
    }
    public function getShoppingCartProducts()
    {
        $userCart = (new UserRepository())->getCartProducts();

        $this->cart = collect(CartProductsResource::collection($userCart)->resolve());

        return $this->cart;
    }
    public function removeCartItem($cartItemId)
    {
        return auth()->user()->shoppingCart()->wherePivot('id', $cartItemId)->detach();
    }
    public function getCartItem($cartItemId)
    {
        return $this->getShoppingCartProducts()->where('cart_item_id', $cartItemId)->first();
    }

    public function incrementCartItemQuantity($cartItemId)
    {

        return  ShoppingCart::query()
            ->where(['user_id' => auth()->id(), 'id' =>  $cartItemId])
            ->increment('quantity', 1);
    }
    public function decrementCartItemQuantity($cartItemId)
    {

        return   ShoppingCart::query()
            ->where(['user_id' => auth()->id(), 'id' =>  $cartItemId])
            ->decrement('quantity', 1);
    }
    public function saveProductforLater($productId, $cartItemId)
    {

        if (!auth()->user()->wishlistHas($productId)) {

            auth()->user()->wishlist()->attach($productId);
        }

        return auth()->user()->shoppingCart()->wherePivot('id', $cartItemId)->detach();
    }
    public function getCartDetails()
    {

        $cartDetails = [
            'shipping_fees' =>  $this->getShipmentFees(),
            'subTotal' => $this->getCartSubTotal(),
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
        $this->cartSubTotal = $this->cart->sum('total_price');

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
        $this->shipmentFees =  $this->cart->where('shipping_cost', '!=', 0.00)->sum('shipping_cost');
        $shipmentFees =  $this->shipmentFees . ' SAR';
        if ($this->shipmentFees == 0) {
            $shipmentFees =  'Free';
        }

        return  $shipmentFees;
    }


    private function getCartTotalWithVat($cartTotal)
    {
        $vat = 15;

        $cartTotalIncludingVat = $cartTotal + ($cartTotal * $vat / 100);

        return $cartTotalIncludingVat;
    }
}