<?php

namespace App\Pages\CheckoutPage\Services;

use App\Modules\Addresses\Repository\AddressRepository;
use App\Modules\Addresses\Resources\AddressResource;
use Illuminate\Support\Facades\Session;
use App\Modules\Products\Models\ShoppingCart;
use App\Modules\Users\Repository\UserRepository;
use App\Modules\Products\Repository\ProductRepository;
use App\Pages\ShopPage\Resources\ProductsListResource;
use App\Pages\ShoppingCartPage\Resources\CartProductsResource;
use App\Pages\ShoppingCartPage\Services\ShoppingCartPageService;

class  CheckoutPageService
{
    private $cart;
    private $cartSubTotal;
    private $shoppingCartPageService;
    private $shipmentFees;

    public function __construct()
    {
        $this->shoppingCartPageService = new ShoppingCartPageService();
    }

    public function getUserAddresses()
    {
        return AddressResource::collection((new AddressRepository())->getUserAddresses())->resolve();
    }
    public function getCheckoutProducts()
    {
        return   $this->shoppingCartPageService->getShoppingCartProducts();
    }
    public function getCheckoutDetails()
    {
        $cartDetails =  $this->shoppingCartPageService->getCartDetails();
        Session::put('cartDetails', $cartDetails);
        return  $cartDetails;
    }
}