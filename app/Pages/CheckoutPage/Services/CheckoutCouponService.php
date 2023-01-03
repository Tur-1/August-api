<?php

namespace App\Pages\CheckoutPage\Services;

use Illuminate\Support\Facades\Session;
use App\Modules\Coupons\Repository\CouponRepository;
use App\Pages\CheckoutPage\Exceptions\InValidCouponCodeException;

class CheckoutCouponService
{
    public $coupon;

    public function getCoupon(string $code)
    {


        $this->coupon =  (new CouponRepository())->getValidCoupon($code);

        if (is_null($this->coupon)) {
            throw new InValidCouponCodeException('This coupon is not Valid');
        }


        return $this->coupon;
    }
    public function getCartTotalWithCoupon($cartTotal)
    {

        $cartDetails = collect(Session::get('cartDetails'));
        $cartDetails['total'] = $this->getCartTotalAfterDiscount($cartTotal);
        $cartDetails['coupon'] =  [
            'code' => $this->coupon->code,
            'discounted_value' =>  $this->getDiscountedValue($cartTotal),
            'message' => 'coupon applied',
        ];

        return $cartDetails;
    }
    public function increaseCouponUsedTimes($copuon)
    {
        if (!is_null($copuon)) $copuon->increment('used_times', 1);
    }

    private function calculateDiscountInPercentages($cartTotal)
    {
        $cartTotal = $cartTotal - ($cartTotal * $this->getCouponAmount() / 100);

        return number_format($cartTotal, 2, '.', '');
    }
    private function calculateDiscountInFixedAmount($cartTotal)
    {
        $cartTotal =  $cartTotal - $this->getCouponAmount();
        return number_format($cartTotal, 2, '.', '');
    }
    private function getCouponAmount()
    {
        return $this->coupon->amount;
    }
    private function getCartTotalAfterDiscount($cartTotal)
    {
        if ($this->isCouponTypePercentage()) {

            return  $this->calculateDiscountInPercentages($cartTotal);
        }

        return $this->calculateDiscountInFixedAmount($cartTotal);
    }
    private function isCouponTypePercentage()
    {
        return $this->coupon->type == 'Percentage';
    }

    private function getDiscountedValue($cartTotal)
    {

        if ($this->isCouponTypePercentage()) {
            $discounted_Value = $this->getCouponAmount() / 100 * $cartTotal;
        } else {
            $discounted_Value =  $this->getCouponAmount();
        }


        return number_format($discounted_Value, 2);
    }
}