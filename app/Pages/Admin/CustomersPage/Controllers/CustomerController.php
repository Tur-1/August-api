<?php

namespace App\Pages\Admin\CustomersPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Admin\CustomersPage\Requests\StoreCustomerRequest;
use App\Pages\Admin\CustomersPage\Requests\UpdateCustomerRequest;
use App\Pages\Admin\CustomersPage\Services\CustomerService;

class CustomerController extends Controller
{

    private $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index(Request $request)
    {
        $this->userCan('access-customers');

        return $this->customerService->getAllCustomers($request);
    }

    public function store(StoreCustomerRequest $request)
    {
        $this->userCan('create-customers');
        $validatedRequest = $request->validated();

        $this->customerService->createCustomer($validatedRequest);

        return response()->success([
            'message' => 'Customer has been created successfully',
        ]);
    }

    public function show($id)
    {
        $this->userCan('view-customers');

        $Customer = $this->customerService->getCustomer($id);

        return response()->success($Customer);
    }

    public function update(UpdateCustomerRequest $request, $id)
    {
        $this->userCan('update-customers');

        $validatedRequest = $request->validated();

        $Customer = $this->customerService->updateCustomer($validatedRequest, $id);

        return response()->success([
            'message' => 'Customer has been updated successfully',
            'customer' => $Customer,
        ]);
    }

    public function destroy($id)
    {
        $this->userCan('delete-customers');

        try {
            $this->customerService->deleteCustomer($id);

            return response()->success([
                'message' => 'Customer has been deleted successfully',
            ]);
        } catch (\Exception $ex) {
            return response()->error('try Again');
        }
    }
}
