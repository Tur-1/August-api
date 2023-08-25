<?php

namespace App\Actions;

use Exception;
use Illuminate\Auth\Access\Response;
use App\Exceptions\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class UserCanAccessAction
{

    public  function userCan(string $permission_name)
    {
        $permissions =   auth('admin')->user()->permissions->pluck('slug')->toArray();

        $can = in_array($permission_name, $permissions);

        if (!$can) {

            throw new UnauthorizedException('Unauthorized', 401);
        }
        return $can;
    }
}
