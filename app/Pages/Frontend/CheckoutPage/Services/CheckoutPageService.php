<?php

namespace App\Pages\Frontend\CheckoutPage\Services;

use Illuminate\Support\Facades\Session;
use App\Modules\Users\Repository\UserAddressRepository;
use App\Pages\Frontend\ShoppingCartPage\Services\ShoppingCartPageService;
use App\Pages\Frontend\MyAccountPage\Resources\UserAddressResource;

class  CheckoutPageService
{

    private $shoppingCartPageService;

    public function __construct()
    {
        $this->shoppingCartPageService = new ShoppingCartPageService();
    }

    public function getUserAddresses()
    {
        return UserAddressResource::collection(
            (new UserAddressRepository())->getUserAddresses()
        )->resolve();
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
