<?php

namespace App\Modules\Users\Repository;

use App\Modules\Users\Models\User;

class UserRepository
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function getAllUsers($request)
    {
        return $this->user->withRoleName()->when($request->search, function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        })->paginate($request->records = 10)->appends($request->all());
    }

    public function createUser($validatedRequest)
    {

        $user = User::create($validatedRequest->all());
        $user->permissions()->sync($validatedRequest['permissionsIds']);
    }

    public function getUserWishlist()
    {
        return auth()->check() ? auth()->user()->wishlist()->pluck('product_id')->toArray() : [];
    }
    public function getUser($id)
    {
        return $this->user->find($id);
    }
    public function getUserWithPermissionsIds($id)
    {
        return $this->user->with('permissions')->find($id);
    }

    public function updateUser($validatedRequest, $id)
    {
        $user = $this->getUser($id);
        $user->update($validatedRequest->all());
        $user->permissions()->sync($validatedRequest['permissionsIds']);

        return $user;
    }

    public function deleteUser($id)
    {
        return $this->user->where('id', $id)->delete();
    }
}