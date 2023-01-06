<?php

namespace App\Modules\Orders\Repository;

use App\Modules\Orders\Models\Order;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Orders\Models\OrderCoupon;
use App\Modules\Orders\Models\OrderAddress;
use App\Modules\Orders\Models\OrderProduct;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository
{
    private $order;

    public function __construct()
    {
        $this->order = new Order();
    }
    public function getAll($records)
    {
        return $this->order->with('user')->paginate($records);
    }
    public function getAllOrders()
    {
        return $this->order->with('user')->get();
    }
    public function createOrder($validatedRequest)
    {
        return auth()->user()->orders()->create($validatedRequest);
    }

    public function storeOrderAddress($request)
    {
        OrderAddress::create($request);
    }

    public function storeOrderCoupon($request)
    {
        OrderCoupon::create($request);
    }
    public function storeOrderProducts($products)
    {
        OrderProduct::insert($products);
    }
    public function getOrder($id)
    {
        return $this->order->with('user', 'coupon', 'products', 'address')->find($id);
    }
    public function updateOrder($validatedRequest, $id)
    {
        $order = $this->getOrder($id);
        $order->update($validatedRequest);
        return  $order;
    }
    public function deleteOrder($id)
    {
        return $this->order->where('id', $id)->delete();
    }
}