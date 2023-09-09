<?php

namespace App\Pages\Frontend\CheckoutPage\Services;

use Exception;
use Mavinoo\Batch\Batch;
use App\Mail\NewOrderMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Modules\Products\Models\Product;
use App\Modules\Products\Models\ProductSize;
use App\Modules\Orders\Repository\OrderRepository;
use App\Modules\Products\Repository\ProductRepository;
use App\Modules\Users\Repository\UserAddressRepository;
use App\Modules\Products\Repository\ProductSizeRepository;
use App\Pages\Frontend\CheckoutPage\Exceptions\AddressNotFoundException;
use App\Pages\Frontend\MyAccountPage\Resources\UserAddressResource;
use App\Pages\Frontend\ShoppingCartPage\Services\ShoppingCartPageService;
use App\Pages\Frontend\CheckoutPage\Exceptions\ProductOutOfStockException;

class  CheckoutOrderService
{

    private $shoppingCartProducts;
    private $order;
    private $shoppingCartPageService;
    private $orderRepository;
    private $orderProducts = [];
    private $orderAddress;

    public function __construct()
    {
        $this->shoppingCartPageService = new ShoppingCartPageService();
        $this->orderRepository = new OrderRepository();
        $this->shoppingCartProducts =  $this->shoppingCartPageService->getShoppingCartProducts();
    }


    public function createNewOrder($cartDetails)
    {

        $this->order =  $this->orderRepository->createOrder($cartDetails);

        return   $this->order;
    }

    public function checkProductsStock()
    {

        foreach ($this->shoppingCartProducts as $cart_item) {
            $message = $cart_item['product']['name'] . ' is out of Stock';
            if ($this->isNotInStock($cart_item)) {

                throw new ProductOutOfStockException($message);
            }

            if ($this->isStockSizeLessThanQty($cart_item)) {

                throw new ProductOutOfStockException($message);
            }
        }
    }
    public function storeOrderProducts()
    {
        $this->orderProducts =  $this->getOrderProducts();

        $this->orderRepository->storeOrderProducts($this->orderProducts);
    }
    public function storeOrderAddress()
    {

        $this->orderAddress['order_id'] = $this->order->id;
        return $this->orderRepository->storeOrderAddress($this->orderAddress);
    }
    public function getUserAddress($adress_id)
    {
        $this->orderAddress =  collect((new CheckoutPageService())->getUserAddresses())
            ->where('address_id', $adress_id)
            ->first();

        if (is_null($this->orderAddress)) {
            throw new AddressNotFoundException();
        }
    }
    public function storeOrderCoupon($coupon)
    {
        if (!is_null($coupon)) {
            $coupon['order_id'] = $this->order->id;
            return $this->orderRepository->storeOrderCoupon($coupon);
        }
    }
    public function getOrderInformation()
    {
        return  [
            'order' => $this->order,
            'user' => [
                'name' => auth()->user()->name,
                'email' => auth()->user()->email
            ],
            'shippingAddress' => $this->orderAddress,
            'orderProducts' => $this->orderProducts()
        ];
    }
    private function getOrderProducts()
    {
        $orderProducts = [];
        $folder = 'public/images/orders/order-' . $this->order->id . '/';
        foreach ($this->shoppingCartProducts as $item) {
            $this->storeProductImage($item, $folder);
            $orderProducts[] = $this->getCartItem($item);
        }
        return $orderProducts;
    }
    private function orderProducts()
    {
        $orderProducts = [];
        $ordersFolder = 'images/orders/order-' . $this->order->id . '/';
        foreach ($this->orderProducts as $item) {
            $item['product_image'] =   config('app.url') .
                Storage::url($ordersFolder . $item['product_image']);

            $orderProducts[] = $item;
        }

        return  $orderProducts;
    }
    private function getCartItem($item)
    {
        return [
            'order_id' =>  $this->order->id,
            'product_name' => $item['product']['name'],
            'product_slug' => $item['product']['slug'],
            'product_image' => $item['product']['main_image'],
            'product_price'  => $item['product']['price'],
            'product_quantity'  => $item['quantity'],
            'total_price' => $item['total_price'],
            'product_attributes' => json_encode([
                'brand' => $item['product']['brand_name'],
                'size' => $item['size']['name'],
            ]),
        ];
    }
    private function storeProductImage($item, $folder)
    {
        Storage::copy('public/' . $item['product']['main_image_name'], $folder . $item['product']['main_image']);
    }
    private function isNotInStock($product)
    {
        return !$product['in_stock'];
    }
    private function isStockSizeLessThanQty($product)
    {
        return $product['size']['stock'] < $product['quantity'];
    }


    public function decrementStockSize()
    {
        $cartProducts =  collect([]);
        $sizes = [];
        foreach ($this->shoppingCartProducts as $index => $product) {
            $sizes[] = [
                'id' => $product['size']['id'],
                'stock' => $product['size']['stock'] - $product['quantity'],
            ];

            foreach (collect($product)['sizes'] as $key => $value) {
                if ($value['pivot']['id'] == $product['size']['id']) {
                    $value['pivot']['stock'] =  $value['pivot']['stock'] - $product['quantity'];
                }
            }

            $cartProducts->push($product);
        }
        (new ProductSizeRepository())->decrementManyStockSize($sizes);

        $this->shoppingCartProducts =  $cartProducts;
    }
    public function updateProductsStock()
    {

        $product_stock =  collect([]);
        foreach ($this->shoppingCartProducts->unique('product.id') as $index => $item) {

            $item['product']['stock']  = collect($item)['sizes']->sum('pivot.stock');

            $product_stock->push([
                'id' => $item['product']['id'],
                'stock' => $item['product']['stock']
            ]);
        }

        (new ProductRepository())->updateManyProductsStock($product_stock->toArray());
    }
}