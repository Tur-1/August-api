<?php

namespace App\Pages\Admin\OrdersPage\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages\Admin\OrdersPage\Services\OrderService;


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


    public function showOrder($id)
    {
        $order =  $this->orderService->showOrder($id);

        return response()->success($order);
    }


    public function destroyOrder($id)
    {

        $this->orderService->deleteOrder($id);

        return response()->success([
            'message' => 'Order has been deleted successfully',
        ]);
    }
}
