<?php

namespace App\Exceptions;

use Exception;

class PageNotFoundException extends Exception
{
    public function render($request)
    {
        return response($this->getMessage());
    }
}