<?php

namespace App\Pages\Frontend\CheckoutPage\Exceptions;

use Exception;

class AddressNotFoundException extends Exception
{

    public function render($request)
    {
        return response()->error(
            'please select an address !',
            404
        );
    }
}