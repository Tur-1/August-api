<?php

namespace App\Modules\Users\Repository;

use App\Modules\Users\Models\User;

class UserRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAllUsers($request)
    {
        return $this->user->when($request->search, function ($query) use ($request) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        })->paginate($request->records = 10)->appends($request->all());
    }

    public function createUser($validatedRequest)
    {

        $user = User::create($validatedRequest->all());
        $user->permissions()->sync($validatedRequest['permissionsIds']);
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