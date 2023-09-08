<?php

namespace App\Exceptions;

use Exception;

class UnauthorizedException extends Exception
{


    public $permissions;
    public function __construct($permissions)
    {
        $this->permissions = $permissions;
    }

    public function render($request)
    {
        return response()->error(
            'you are not authorized',
            403,
            $this->permissions
        );
    }
}
