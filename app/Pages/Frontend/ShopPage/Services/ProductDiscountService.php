<?php

namespace App\Pages\Frontend\ShopPage\Services;

use Carbon\Carbon;

class ProductDiscountService
{
    public $price;
    public $start_at;
    public $expires_at;
    public $discounted_price;
    public $type;
    public $amount;

    public function __construct($discountData)
    {
        $this->price = $discountData['price'];
        $this->discounted_price = $discountData['discounted_price'];

        $this->start_at = $discountData['discount_start_at'];
        $this->expires_at = $discountData['discount_expires_at'];
        $this->type  = $discountData['discount_type'];
        $this->amount  = $discountData['discount_amount'];
    }

    public function getPrice()
    {

        $price = null;

        if ($this->isDiscountValid()) {
            $price = $this->discounted_price;
        }

        if (!$this->isDiscountValid()) {
            $price =  $this->price;
        }

        return  $price;
    }

    public function getPriceBeforeDiscount()
    {
        return $this->price;
    }
    public function getDiscountAmount()
    {

        if ($this->isDiscountTypePercentage()) {

            $this->amount .= ' %OFF';
        }
        if ($this->isDiscountTypeFixed()) {

            $this->amount .=  ' SAR';
        }

        return $this->amount;
    }

    public function isDiscountValid()
    {
        $currentDate =  Carbon::now('GMT+3');
        return  !is_null($this->discounted_price) && $currentDate->between($this->start_at, $this->expires_at);
    }

    private function isDiscountTypePercentage()
    {
        return  $this->type == 'Percentage';
    }
    private function isDiscountTypeFixed()
    {
        return  $this->type == 'Fixed';
    }
}
