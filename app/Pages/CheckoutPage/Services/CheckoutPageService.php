<?php

namespace App\Pages\CheckoutPage\Services;

use Exception;
use Mavinoo\Batch\Batch;
use Illuminate\Support\Facades\Session;
use App\Modules\Products\Models\Product;
use App\Modules\Orders\Repository\OrderRepository;
use App\Modules\Addresses\Resources\AddressResource;
use App\Modules\Addresses\Repository\AddressRepository;
use App\Modules\Products\Repository\ProductSizeRepository;
use App\Pages\ShoppingCartPage\Services\ShoppingCartPageService;
use App\Pages\CheckoutPage\Exceptions\ProductOutOfStockException;

class  CheckoutPageService
{
    private $cartProducts;
    private $order;
    private $shoppingCartPageService;
    private $orderRepository;

    private $orderAddress;

    public function __construct()
    {
        $this->shoppingCartPageService = new ShoppingCartPageService();
        $this->orderRepository = new OrderRepository();
        $this->cartProducts =  $this->shoppingCartPageService->getShoppingCartProducts();
    }

    public function getUserAddresses()
    {
        $userAddresses = AddressResource::collection((new AddressRepository())->getUserAddresses())->resolve();

        Session::put('userAddresses', $userAddresses);
        return $userAddresses;
    }
    public function getCheckoutProducts()
    {
        return   $this->cartProducts;
    }
    public function getCheckoutDetails()
    {

        $cartDetails =  $this->shoppingCartPageService->getCartDetails();
        Session::put('cartDetails', $cartDetails);
        return  $cartDetails;
    }
    public function createNewOrder($cartDetails)
    {
        if ($cartDetails['shipping_fees'] == 'Free') {
            $cartDetails['shipping_fees'] = 0.00;
        }

        $this->order =  $this->orderRepository->createOrder($cartDetails->toArray());

        return   $this->order;
    }
    public function storeOrderAddress()
    {
        $this->orderAddress['order_id'] = $this->order->id;
        return $this->orderRepository->storeOrderAddress($this->orderAddress);
    }
    public function checkProductsStock()
    {

        foreach ($this->cartProducts as $product) {
            $message = $product['name'] . ' is out of Stock';
            if ($this->isNotInStock($product)) {

                throw new ProductOutOfStockException($message);
            }

            if ($this->isStockSizeLessThanQty($product)) {

                throw new ProductOutOfStockException($message);
            }
        }
    }
    public function storeOrderCoupon($coupon)
    {
        if (!is_null($coupon)) {
            $coupon['order_id'] = $this->order->id;
            return $this->orderRepository->storeOrderCoupon($coupon);
        }
    }
    public function storeOrderProducts()
    {
        return $this->orderRepository->storeOrderProducts($this->getOrderProducts());
    }
    public function decreaseStockSize()
    {

        $productSize = new ProductSizeRepository();

        $cartProducts = collect([]);
        foreach ($this->cartProducts as $index => $product) {
            $productSize->decreaseStockSize($product['quantity'], $product['size_id']);

            foreach (collect($product)['sizes'] as $key => $value) {
                if ($value['pivot']['id'] == $product['size_id']) {
                    $value['pivot']['stock'] =  $value['pivot']['stock'] - $product['quantity'];
                }
            }


            $cartProducts->push($product);
        }

        $this->cartProducts = $cartProducts;
    }
    public function updateProductsStock()
    {
        $product_stock =  collect([]);
        foreach ($this->cartProducts->unique('id') as $index => $product) {

            $product['stock']  = collect($product)['sizes']->sum('pivot.stock');

            $product_stock->push([
                'id' => $product['id'],
                'stock' => $product['stock']
            ]);
        }

        $productInstance = new Product();


        $index = 'id';
        batch()->update($productInstance, $product_stock->toArray(), $index);
    }
    public function getUserAddress($adress_id)
    {
        $this->orderAddress =  collect(Session::get('userAddresses'))->where('address_id', $adress_id)->first();

        if (is_null($this->orderAddress)) {
            throw new Exception('please select an address !');
        }
    }
    private function getOrderProducts()
    {
        $orderProducts = [];
        foreach ($this->cartProducts as $product) {
            $orderProducts[] = [
                'order_id' =>  $this->order->id,
                'product_name' => $product['name'],
                'product_slug' => $product['slug'],
                'product_brand' => $product['brand_name'],
                'product_image' => $product['main_image_full_name'],
                'product_size' => $product['size'],
                'product_quantity'  => $product['quantity'],
                'product_price'  => $product['price'],
                'total_price' => $product['total_price']
            ];
        }

        return $orderProducts;
    }
    private function isNotInStock($product)
    {
        return $product['stock'] == 0;
    }
    private function isStockSizeLessThanQty($product)
    {
        return $product['stock_size'] < $product['quantity'];
    }
}