<?php

namespace App\Modules\Orders\Repository;

use Illuminate\Support\Facades\DB;
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
    public function getAll()
    {
        return $this->order->with('user')->latest()->paginate(12);
    }
    public function getAllOrders()
    {
        return $this->order->with('user')->get();
    }

    public function getUserOrders()
    {
        return auth('web')->user()->orders()->latest()->get();
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
        return $this->order->query()
            ->with('user', 'coupon', 'products', 'address')
            ->find($id);
    }
    public function getUserOrder($id)
    {
        return $this->order->query()->where('user_id', auth()->id())
            ->with('user', 'coupon', 'products', 'address')
            ->find($id);
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
