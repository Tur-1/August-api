<?php

namespace App\Traits;

use App\Exceptions\UnauthorizedException;

trait UserCanAccess
{
    public function userCan(string $permission_name)
    {

        $permissions = auth('admin')->user()->permissions->pluck('slug')->toArray();

        $can = in_array($permission_name, $permissions);

        if (!$can) {
            throw new UnauthorizedException($permissions);
        }
        return $can;
    }
}
