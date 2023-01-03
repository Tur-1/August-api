<?php

namespace App\Pages\CheckoutPage\Exceptions;

use Exception;

class ProductNoLongerInStockException extends Exception
{
    public function render($request)
    {
        return response($this->getMessage());
    }
}