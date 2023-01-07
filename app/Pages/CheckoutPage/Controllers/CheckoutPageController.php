<?php

namespace App\Pages\CheckoutPage\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Modules\Users\Repository\UserRepository;
use App\Pages\CheckoutPage\Services\CheckoutPageService;
use App\Pages\CheckoutPage\Services\CheckoutCouponService;
use App\Pages\ShoppingCartPage\Services\ShoppingCartPageService;
use App\Pages\CheckoutPage\Exceptions\InValidCouponCodeException;
use App\Pages\CheckoutPage\Exceptions\ProductOutOfStockException;

class CheckoutPageController extends Controller
{

    private $coupon;

    public function index(CheckoutPageService $checkoutPageService)
    {
        Session::remove('cartDetailsWithCoupon');
        return  response()->success([
            'userAddresses' => $checkoutPageService->getUserAddresses(),
            'products' => $checkoutPageService->getCheckoutProducts(),
            'cartDetails' => $checkoutPageService->getCheckoutDetails(),
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

        try {
            $checkoutCouponService->getCoupon($request->couponCode);
        } catch (InValidCouponCodeException $ex) {
            return  response()->error($ex->getMessage(), 404);
        }



        $cartDetails = $checkoutCouponService->getCartTotalWithCoupon($request->cartTotal);

        Session::put('cartDetailsWithCoupon', $cartDetails);

        return  response()->success([
            'cartDetails' => Session::get('cartDetailsWithCoupon'),
        ]);
    }
    public function buyNow(Request $request, CheckoutPageService $checkoutPageService)
    {
        $cartDetails = Session::get('cartDetails');
        $cartDetailsWithCoupon = Session::get('cartDetailsWithCoupon');


        try {
            $checkoutPageService->getUserAddress($request->address_id);
        } catch (\Exception $ex) {
            return  response()->error($ex->getMessage(), 404);
        }



        if (!is_null($cartDetailsWithCoupon)) {

            $cartDetails = $cartDetailsWithCoupon->toArray();
            try {
                $this->coupon = (new CheckoutCouponService())->getCoupon($cartDetails['coupon']['code']);
            } catch (InValidCouponCodeException $ex) {

                Session::remove('cartDetailsWithCoupon');
                return  response()->error($ex->getMessage(), 404);
            }
        }


        try {
            DB::transaction(function () use ($checkoutPageService, $cartDetails) {
                $this->order =  $checkoutPageService->createNewOrder($cartDetails);

                $checkoutPageService->checkProductsStock();
            });
        } catch (ProductOutOfStockException $ex) {
            return response()->error($ex->getMessage(), 404);
        }



        $checkoutPageService->storeOrderProducts();
        $checkoutPageService->decreaseStockSize();
        $checkoutPageService->updateProductsStock();
        $checkoutPageService->storeOrderAddress();
        $checkoutPageService->storeOrderCoupon($cartDetails['coupon']);
        (new CheckoutCouponService())->increaseCouponUsedTimes($this->coupon);


        (new ShoppingCartPageService())->deleteUserCartProducts();

        Session::forget(['cartDetailsWithCoupon', 'cartDetails']);

        return  response()->success([
            'message' => 'Your order number #' . $this->order->id . ' has been received successfully',
        ]);
    }
}