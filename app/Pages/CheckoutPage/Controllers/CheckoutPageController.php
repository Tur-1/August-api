<?php

namespace App\Pages\CheckoutPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Users\Repository\UserRepository;
use App\Pages\CheckoutPage\Services\CheckoutPageService;
use App\Pages\ShoppingCartPage\Services\ShoppingCartPageService;

class CheckoutPageController extends Controller
{


    public function index(CheckoutPageService $checkoutPageService)
    {

        return  response()->success([
            'userAddresses' => $checkoutPageService->getUserAddresses(),
            'products' => $checkoutPageService->getCheckoutProducts(),
            'cartDetails' => $checkoutPageService->getCheckoutDetails(),
        ]);
    }
}