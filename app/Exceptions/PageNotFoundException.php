<?php

namespace App\Exceptions;

use Exception;

class PageNotFoundException extends Exception
{
    public function render($request)
    {
        return response()->error(
            'page not found',
            404,
        );
    }
}