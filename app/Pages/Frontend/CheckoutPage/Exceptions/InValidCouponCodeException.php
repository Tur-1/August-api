<?php

namespace App\Pages\Frontend\CheckoutPage\Exceptions;

use Exception;

class InValidCouponCodeException extends Exception
{

    public function render($request)
    {
        return response()->error(
            'This coupon is not Valid',
            404,
        );
    }
}