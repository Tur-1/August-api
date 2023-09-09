<?php

namespace App\Pages\Frontend\CheckoutPage\Exceptions;

use Exception;

class ProductOutOfStockException extends Exception
{



    public function render($request)
    {
        return response()->error(
            $this->getMessage(),
            404
        );
    }
}