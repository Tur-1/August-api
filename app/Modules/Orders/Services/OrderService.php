<?php

namespace App\Modules\Orders\Services;

use App\Modules\Orders\Repository\OrderRepository;

class OrderService
{
    private $orderRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
    }
    public function getAll($records = 12)
    {
        return $this->orderRepository->getAll($records);
    }
    public function createOrder($validatedRequest)
    {
        return $this->orderRepository->createOrder($validatedRequest);
    }
    public function storeOrderAddress($request)
    {
        return $this->orderRepository->storeOrderAddress($request);
    }

    public function storeOrderCoupon($request)
    {
        return $this->orderRepository->storeOrderCoupon($request);
    }
    public function storeOrderProducts($products)
    {
        return $this->orderRepository->storeOrderCoupon($products);
    }
    public function showOrder($id)
    {
        return $this->orderRepository->getOrder($id);
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