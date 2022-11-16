<?php

namespace App\Models\User\Repository;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function getAllUsers($records)
    {
        return $this->user->paginate($records);
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
        return  $user;
    }
    public function deleteUser($id)
    {
        return $this->user->where('id', $id)->delete();
    }
}