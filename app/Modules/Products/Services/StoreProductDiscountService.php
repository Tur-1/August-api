<?php

namespace App\Pages\Admin\ProductsPage\Services;

class StoreProductDiscountService
{
    public function getDiscountedPrice($request)
    {
        $discounted_price = null;
        if ($this->isDiscountTypePercentage($request)) {

            $discounted_price = $this->calculatePercentageDiscount($request);
        }

        if ($this->isDiscountTypeFixed($request)) {
            $discounted_price = $this->calculateFixedDiscount($request);
        }

        return $discounted_price;
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
