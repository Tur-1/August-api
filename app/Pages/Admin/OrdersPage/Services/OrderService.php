<?php

namespace App\Pages\Admin\OrdersPage\Services;

use App\Modules\Orders\Repository\OrderRepository;
use App\Pages\Admin\OrdersPage\Resources\OrderResource;

class OrderService
{
    private $orderRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
    }
    public function getAll($records = 12)
    {
        return OrderResource::collection($this->orderRepository->getAll($records));
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
