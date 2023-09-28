<?php

namespace App\Modules\Products\Services;

use Carbon\Carbon;

class ProductDiscountService
{
    public $price;
    public $start_at;
    public $expires_at;
    public $price_after_discount;
    public $type;
    public $amount;

    public function __construct(
        $original_price,
        $price_after_discount,
        $discount_start_at,
        $discount_expires_at,
        $discount_type,
        $discount_amount
    ) {
        $this->price = $original_price;
        $this->price_after_discount = $price_after_discount;
        $this->start_at = $discount_start_at;
        $this->expires_at = $discount_expires_at;
        $this->type = $discount_type;
        $this->amount =  $discount_amount;
    }

   
    public function getPrice()
    {
        $price = null;

        if ($this->isDiscountValid()) {
            $price = $this->price_after_discount;
        }

        if (!$this->isDiscountValid()) {
            $price = $this->price;
        }

        return $price;
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
            $this->amount .= ' SAR';
        }

        return $this->amount;
    }

    public function isDiscountValid()
    {
        $currentDate = Carbon::now('GMT+3');

        return !is_null($this->price_after_discount) && $currentDate->between($this->start_at, $this->expires_at);
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
