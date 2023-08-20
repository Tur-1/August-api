<?php

namespace App\Pages\Admin\OrdersPage\Services;

use App\Modules\Orders\Repository\OrderRepository;
use App\Pages\Admin\OrdersPage\Resources\OrderResource;
use App\Pages\Admin\OrdersPage\Resources\OrdersListResource;

class OrderService
{
    private $orderRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
    }
    public function getAll()
    {
        return OrdersListResource::collection($this->orderRepository->getAll());
    }

    public function showOrder($id)
    {
        return OrderResource::make($this->orderRepository->getOrder($id))->resolve();
    }
    public function updateOrder($validatedRequest, $id)
    {
        return $this->orderRepository->updateOrder($validatedRequest, $id);
    }
    public function deleteOrder($id)
    {
        return $this->orderRepository->deleteOrder($id);
    }
}
