<?php

namespace App\Pages\Admin\CustomersPage\Services;

use App\Modules\Users\Repository\UserRepository;
use App\Pages\Admin\CustomersPage\Resources\CustomerShowResource;
use App\Pages\Admin\CustomersPage\Resources\CustomersListResource;

class CustomerService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllCustomers($request)
    {
        return CustomersListResource::collection($this->userRepository->getAllUsers($request));
    }

    public function createCustomer($validatedRequest)
    {
        return $this->userRepository->createUser($validatedRequest);
    }

    public function getCustomer($id)
    {
        return $this->userRepository->getUser($id);
    }



    public function updateCustomer($validatedRequest, $id)
    {
        return CustomerShowResource::make($this->userRepository->updateUser($validatedRequest, $id));
    }

    public function deleteCustomer($id)
    {
        return $this->userRepository->deleteUser($id);
    }
}
