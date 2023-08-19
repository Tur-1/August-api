<?php

namespace App\Pages\Frontend\CheckoutPage\Services;

use Illuminate\Support\Facades\Session;
use App\Modules\Coupons\Repository\CouponRepository;
use App\Modules\Coupons\Services\DiscountService;
use App\Pages\Frontend\CheckoutPage\Exceptions\InValidCouponCodeException;

class CheckoutCouponService
{
    public $coupon;

    public function getCoupon(string $code)
    {


        $this->coupon =  (new CouponRepository())->getValidCoupon($code);

        Session::put('coupon', $this->coupon);
        if (is_null($this->coupon)) {
            throw new InValidCouponCodeException('This coupon is not Valid');
        }


        return $this->coupon;
    }
    public function getCartDetailsWithCoupon()
    {
        $cartDetails = collect(Session::get('cartDetails'));

        $discountData = [
            'price' =>  $cartDetails['total'],
            'amount' =>  $this->coupon->amount,
            'type' => $this->coupon->type,
        ];

        $discountService = new DiscountService($discountData);


        $cartDetails['total'] = number_format($discountService->getPriceAfterDiscount(), 2, '.', '');
        $cartDetails['coupon'] =  [
            'code' => $this->coupon->code,
            'type' => $this->coupon->type,
            'amount' => $this->coupon->amount,
            'discounted_amount' => number_format($discountService->getDiscountedAmount(), 2),
        ];

        return $cartDetails;
    }
    public function increaseCouponUsedTimes($copuon)
    {
        if (!is_null($copuon)) $copuon->increment('used_times', 1);
    }
}
