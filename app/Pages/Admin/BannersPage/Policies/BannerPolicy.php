<?php

namespace App\Pages\Admin\BannersPage\Policies;

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

        return $this->userCanAccessAction->userCan('access-banners');
    }

    public function view()
    {
        return $this->userCanAccessAction->userCan('view-banners');
    }

    public function create()
    {

        return $this->userCanAccessAction->userCan('create-banners');
    }

    public function update()
    {

        return $this->userCanAccessAction->userCan('update-banners');
    }

    public function delete()
    {

        return $this->userCanAccessAction->userCan('delete-banners');
    }
    public function restore()
    {
        //
    }
}