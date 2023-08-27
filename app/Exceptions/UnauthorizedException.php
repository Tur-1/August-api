<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Session;

class UnauthorizedException extends Exception
{

    public static function userNotAuthorized()
    {

        return new self('you are not authorized', 403);
    }
}
