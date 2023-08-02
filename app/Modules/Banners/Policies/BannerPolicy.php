<?php

namespace App\Modules\Banners\Policies;

use App\Actions\UserCanAccessAction;
use Illuminate\Auth\Access\HandlesAuthorization;

class BannerPolicy
{
    use HandlesAuthorization;

    private $userCanAccessAction;

    public function __construct(UserCanAccessAction $userCanAccessAction)
    {
        $this->userCanAccessAction = $userCanAccessAction;
    }
    public function viewAny()
    {

        return $this->userCanAccessAction->userCanAccess('access-banners');
    }

    public function view()
    {
        return $this->userCanAccessAction->userCanAccess('view-banners');
    }

    public function create()
    {

        return $this->userCanAccessAction->userCanAccess('create-banners');
    }

    public function update()
    {

        return $this->userCanAccessAction->userCanAccess('update-banners');
    }

    public function delete()
    {

        return $this->userCanAccessAction->userCanAccess('delete-banners');
    }
    public function restore()
    {
        //
    }
}
