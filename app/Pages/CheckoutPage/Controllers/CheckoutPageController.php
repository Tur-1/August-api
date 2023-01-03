<?php

namespace App\Pages\CheckoutPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Modules\Users\Repository\UserRepository;
use App\Pages\CheckoutPage\Services\CheckoutPageService;
use App\Pages\CheckoutPage\Services\CheckoutCouponService;
use App\Pages\ShoppingCartPage\Services\ShoppingCartPageService;
use App\Pages\CheckoutPage\Exceptions\InValidCouponCodeException;

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

    public function applyCoupon(Request $request, CheckoutCouponService $checkoutCouponService,)
    {

        $coupon = Session::get('cartDetailsWithCoupon');


        try {
            $checkoutCouponService->getCoupon($request->couponCode);
        } catch (InValidCouponCodeException $ex) {
            return  response()->error($ex->getMessage(), 404);
        }

        if (!is_null($coupon)) {
            Session::remove('cartDetailsWithCoupon');

            return  response()->success([
                'cartDetails' => Session::get('cartDetails'),
            ]);
        }

        $cartDetails = $checkoutCouponService->getCartTotalWithCoupon($request->cartTotal);

        Session::put('cartDetailsWithCoupon', $cartDetails);

        return  response()->success([
            'cartDetails' => Session::get('cartDetailsWithCoupon'),
        ]);
    }
    public function buyNow(Request $request)
    {
    }
}