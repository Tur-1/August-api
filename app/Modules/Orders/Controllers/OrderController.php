<?php

namespace App\Modules\Orders\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Orders\Requests\StoreOrderRequest;
use App\Modules\Orders\Requests\UpdateOrderRequest;
use App\Modules\Orders\Services\OrderService;


class OrderController extends Controller
{


    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }


    public function index(Request $request)
    {
        return  $this->orderService->getAll();
    }


    public function storeOrder(StoreOrderRequest $request)
    {
        $validatedRequest = $request->validated();

        $this->orderService->createOrder($validatedRequest);

        return response()->success([
            'message' => 'Order has been created successfully'
        ]);
    }


    public function showOrder($id)
    {
        $order =  $this->orderService->showOrder($id);

        return response()->success($order);
    }


    public function updateOrder(UpdateOrderRequest $request, $id)
    {
        $validatedRequest = $request->validated();

        $order =  $this->orderService->updateOrder($validatedRequest, $id);

        return response()->success([
            'message' => 'Order has been updated successfully',
            'order' => $order,
        ]);
    }


    public function destroyOrder($id)
    {

        $this->orderService->deleteOrder($id);

        return response()->success([
            'message' => 'Order has been deleted successfully',
        ]);
    }
}