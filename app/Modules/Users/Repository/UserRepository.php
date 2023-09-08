<?php

namespace App\Modules\Users\Repository;

use App\Modules\Users\Models\User;
use App\Exceptions\PageNotFoundException;

class UserRepository
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function getAllUsers($request)
    {
        return $this->user->query()
            ->search($request->search)
            ->paginate(12)
            ->appends($request->all());
    }

    public function createUser($validatedRequest)
    {
        $this->user =  User::create(
            [
                'name' => $validatedRequest['register_name'],
                'email' => $validatedRequest['register_email'],
                'password' => $validatedRequest['register_password'],
                'gender' => $validatedRequest['gender'],
            ]
        );

        return  $this->user;
    }
    public function getWishlistProducts()
    {

        return auth()->user()->wishlistProducts;
    }
    public function getCartProducts()
    {

        return auth()->user()->shoppingCartProducts;
    }
    public function getCheckoutProducts()
    {

        return auth()->user()->shoppingCartProducts;
    }


    public function getUser($id)
    {
        $this->user = $this->user->find($id);
        if (is_null($this->user)) {
            throw new PageNotFoundException();
        }

        return $this->user;
    }


    public function updateUser($validatedRequest, $id)
    {
        $user = $this->getUser($id);
        $user->update($validatedRequest);

        return $user;
    }

    public function deleteUser($id)
    {
        return $this->user->where('id', $id)->delete();
    }
}