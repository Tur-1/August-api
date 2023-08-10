<?php

namespace App\Pages\Frontend\WishlistPage\Services;

use App\Modules\Users\Repository\UserRepository;
use App\Modules\Wishlist\Repository\WishlistRepository;
use App\Pages\Frontend\ShopPage\Resources\ProductsListResource;

class  WishlistPageService
{

    private $wishlistRepository;


    public function __construct()
    {
        $this->wishlistRepository = new WishlistRepository();
    }
    public function getWishlistProducts()
    {
        $products = (new UserRepository())->getWishlistProducts();

        $products->each(function ($product) {
            $product->inWishlist = true;
        });
        return  ProductsListResource::collection($products);
    }

    public function addProductToWishlist($product_id)
    {
        $inWishlist = false;

        if ($this->wishlistRepository->isExists($product_id)) {
            $this->wishlistRepository->removeWishlistProduct($product_id);
        } else {
            $this->wishlistRepository->storeWishlistProduct($product_id);
            $inWishlist = true;
        }

        return $inWishlist;
    }
}
