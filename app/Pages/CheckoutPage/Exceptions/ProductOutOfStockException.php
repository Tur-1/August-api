<?php

namespace App\Pages\CheckoutPage\Exceptions;

use Exception;

class ProductOutOfStockException extends Exception
{
    public function render($request)
    {
        return response($this->getMessage());
    }
}