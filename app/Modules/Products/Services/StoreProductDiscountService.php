<?php

namespace App\Modules\Products\Services;

class StoreProductDiscountService
{
    public function getPriceAfterDiscount($request)
    {
        $price_after_discount = null;
        if ($this->isDiscountTypePercentage($request)) {

            $price_after_discount = $this->calculatePercentageDiscount($request);
        }

        if ($this->isDiscountTypeFixed($request)) {
            $price_after_discount = $this->calculateFixedDiscount($request);
        }

        return $price_after_discount;
    }


    private function calculatePercentageDiscount($request)
    {
        return  $request->price - ($request->price * $request->discount_amount / 100);
    }
    private function calculateFixedDiscount($request)
    {
        return  $request->price - $request->discount_amount;
    }

    private function isDiscountTypePercentage($request)
    {
        return $request->discount_type == 'Percentage';
    }
    private function isDiscountTypeFixed($request)
    {
        return $request->discount_type == 'Fixed';
    }
}