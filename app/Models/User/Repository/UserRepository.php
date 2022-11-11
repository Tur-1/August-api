<?php

namespace App\Models\User\Repository;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class UserRepository
{

    public function getAllUsers()
    {
        return User::get();
    }
    public function createUser($validatedRequest)
    {
        return User::create($validatedRequest);
    }
    public function findUserById($id)
    {
        return User::find($id);
    }
}