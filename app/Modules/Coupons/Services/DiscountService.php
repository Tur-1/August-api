<?php

namespace App\Modules\Coupons\Services;

use Carbon\Carbon;

class DiscountService
{

    public $type;
    public $amount;
    public $price;
    public $start_at;
    public $expires_at;

    public function __construct($discountData)
    {

        $this->price = $discountData['price'];
        $this->type = $discountData['type'];
        $this->amount = $discountData['amount'];
        $this->start_at = isset($discountData['start_at']) ? $discountData['start_at'] : null;
        $this->expires_at =  isset($discountData['expires_at']) ? $discountData['expires_at'] : null;
    }
    public function getPriceAfterDiscount()
    {
        $price_after_discount = null;
        if ($this->isDiscountTypePercentage()) {

            $price_after_discount = $this->calculatePercentageDiscount();
        }

        if ($this->isDiscountTypeFixed()) {
            $price_after_discount = $this->calculateFixedDiscount();
        }

        return $price_after_discount;
    }

    public function getDiscountedAmount()
    {

        if ($this->isDiscountTypePercentage()) {
            $this->amount =  $this->amount / 100 * $this->price;
        }

        return $this->amount;
    }
    public function isDiscountValid()
    {
        $currentDate =  Carbon::now('GMT+3');
        return  $currentDate->between($this->start_at, $this->expires_at);
    }
    private function calculatePercentageDiscount()
    {
        return  $this->price - ($this->price * $this->amount / 100);
    }
    private function calculateFixedDiscount()
    {
        return  $this->price - $this->amount;
    }


    private function isDiscountTypePercentage()
    {
        return $this->type == 'Percentage';
    }
    private function isDiscountTypeFixed()
    {
        return $this->type == 'Fixed';
    }
}
