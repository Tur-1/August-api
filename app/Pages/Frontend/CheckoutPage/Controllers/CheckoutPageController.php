<?php

namespace App\Pages\Frontend\CheckoutPage\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Pages\Frontend\CheckoutPage\Services\CheckoutPageService;
use App\Pages\Frontend\CheckoutPage\Services\CheckoutCouponService;
use App\Pages\Frontend\ShoppingCartPage\Services\ShoppingCartPageService;
use App\Pages\Frontend\CheckoutPage\Exceptions\InValidCouponCodeException;
use App\Pages\Frontend\CheckoutPage\Exceptions\ProductOutOfStockException;
use App\Pages\Frontend\CheckoutPage\Services\CheckoutOrderService;

class CheckoutPageController extends Controller
{

    private $coupon;
    private $order;
    public function index(CheckoutPageService $checkoutPageService)
    {
        Session::forget(['cartDetails', 'cartDetailsWithCoupon']);
        return  response()->success([
            'user_addresses' => $checkoutPageService->getUserAddresses(),
            'products' => $checkoutPageService->getCheckoutProducts(),
            'cart_details' => $checkoutPageService->getCheckoutDetails(),
        ]);
    }

    public function applyCoupon(Request $request, CheckoutCouponService $checkoutCouponService)
    {


        $coupon = Session::get('cartDetailsWithCoupon');
        if (!is_null($coupon)) {
            Session::remove('cartDetailsWithCoupon');

            return  response()->success([
                'cartDetails' => Session::get('cartDetails'),
            ]);
        }

        $checkoutCouponService->getCoupon($request->code);



        $cartDetails = $checkoutCouponService->getCartDetailsWithCoupon();

        Session::put('cartDetailsWithCoupon', $cartDetails);

        return  response()->success([
            'cartDetails' =>  $cartDetails,
            'message' => 'coupon applied',
        ]);
    }
    public function buyNow(Request $request,  CheckoutOrderService $checkoutOrderService)
    {


        $cartDetails = Session::get('cartDetails');
        $cartDetailsWithCoupon = Session::get('cartDetailsWithCoupon');
        $couponService = new CheckoutCouponService();

        $checkoutOrderService->getUserAddress($request->address_id);


        if (!is_null($cartDetailsWithCoupon)) {
            $cartDetails = $cartDetailsWithCoupon->toArray();
            $this->coupon = $couponService->getCoupon($cartDetails['coupon']['code']);
        }


        try {
            DB::transaction(function () use ($checkoutOrderService, $cartDetails) {
                $this->order =  $checkoutOrderService->createNewOrder($cartDetails);

                $checkoutOrderService->checkProductsStock();
            });

            $checkoutOrderService->storeOrderProducts();
            $checkoutOrderService->decrementStockSize();
            $checkoutOrderService->updateProductsStock();
            $checkoutOrderService->storeOrderAddress();

            $checkoutOrderService->storeOrderCoupon($cartDetails['coupon']);
            $couponService->increaseCouponUsedTimes($this->coupon);


            $checkoutOrderService->sendOrderConfirmationMail();

            (new ShoppingCartPageService())->deleteUserCartProducts();

            Session::forget(['cartDetailsWithCoupon', 'cartDetails']);
        } catch (ProductOutOfStockException $ex) {
            return response()->error($ex->getMessage(), 404);
        }


        return  response()->success([
            'message' => 'Your order number #' . $this->order->id . ' has been received successfully',
        ]);
    }
}
