<?php

namespace App\Pages\Admin\ProductsPage\Services;

use Carbon\Carbon;

class ProductDiscountService
{
    public function getDiscountedPrice($request)
    {
        if ($this->isDiscountTypePercentage($request)) {
            return $this->calculateDiscountedPriceInPercentages($request);
        } else {
            return $request->price - $request->discount_amount;
        }
    }
    public function getDiscountAmount($discountAmount, $discount_type)
    {
        $discounted_price = 0;

        $discount_amount = $discountAmount;

        if ($discount_type == 'Percentage') {

            $discount_amount = $discountAmount . '% OFF';
        } else {

            $discount_amount = $discountAmount . 'SAR';
        }

        return $discount_amount;
    }
    public function getDiscount($discountData): array
    {

        $discount_amount = $discountData['discount_amount'] ? $this->getDiscountAmount($discountData['discount_amount'], $discountData['discount_type']) : null;
        $price =  $discountData['price'];
        $price_before_discount = null;
        if ($this->isDicountValid($discountData)) {
            $price =  $discountData['discounted_price'];
            $price_before_discount = $discountData['price'];
        }

        return [
            'price' => $price,
            'price_before_discount' =>  $price_before_discount,
            'discount_amount' =>  $discount_amount
        ];
    }

    private function isDicountValid($discounteData)
    {
        $currentDate =  Carbon::now('GMT+3');
        return  !is_null($discounteData['discounted_price'])  && $currentDate->between($discounteData['discount_start_at'], $discounteData['discount_expires_at']);
    }
    private function calculateDiscountedPriceInPercentages($request)
    {
        return  $request->price - ($request->price * $request->discount_amount / 100);
    }

    private function isDiscountTypePercentage($request)
    {
        return $request->discount_type == 'Percentage';
    }
}
