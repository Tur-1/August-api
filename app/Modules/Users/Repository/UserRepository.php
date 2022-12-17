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
            $query->where('name', 'LIKE', '%'.$request->search.'%');
        })->paginate($request->records = 10)->appends($request->all());
    }

    public function createUser($validatedRequest)
    {
        return $this->user->create($validatedRequest);
    }

    public function findUser($id)
    {
        return $this->user->find($id);
    }

    public function updateUser($validatedRequest, $id)
    {
        $user = $this->findUser($id);
        $user->update($validatedRequest);

        return $user;
    }

    public function deleteUser($id)
    {
        return $this->user->where('id', $id)->delete();
    }
}