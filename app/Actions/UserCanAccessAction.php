<?php

namespace App\Actions;

use Illuminate\Auth\Access\Response;


class UserCanAccessAction
{

    public  function userCanAccess(string $permission_name)
    {
        $permissions =   auth()->user()->permissions->pluck('slug')->toArray();


        return in_array($permission_name, $permissions);
    }
}
