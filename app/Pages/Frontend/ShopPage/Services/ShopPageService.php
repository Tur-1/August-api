<?php

namespace App\Pages\Frontend\ShopPage\Services;

use App\Exceptions\PageNotFoundException;
use App\Modules\Sizes\Repository\SizeRepository;
use App\Modules\Brands\Repository\BrandRepository;
use App\Modules\Colors\Repository\ColorRepository;
use App\Modules\Products\Repository\ProductRepository;
use App\Modules\Wishlist\Repository\WishlistRepository;
use App\Pages\Frontend\ShopPage\Resources\ColorListResource;
use App\Pages\Frontend\ShopPage\Resources\BrandsListResource;
use App\Pages\Frontend\ShopPage\Resources\ProductsListResource;
use App\Pages\Frontend\ShopPage\Resources\SizeOptionsListResource;

class  ShopPageService
{
    private $category_url;
    private $products;
    private $brands;

    public function __construct($category_url = null)
    {
        $this->category_url = $category_url;
    }


    public function getBrands()
    {

        $brands = (new BrandRepository())->getBrandsByProductsCategory($this->category_url);


        $this->brands = $brands->mapWithKeys(function ($brand) {
            return [$brand['id'] => $brand->name];
        });
        return BrandsListResource::collection($brands);
    }
    public function getColors($category_url)
    {
        $colors = (new ColorRepository())->getColorsByProductsCategory($category_url);


        return ColorListResource::collection($colors);
    }

    public function getShopPageTotalProducts()
    {
        return (new ProductRepository())->getShopPageTotalProducts($this->category_url);
    }
    public function getProducts()
    {
        $this->products = (new ProductRepository())->getShopPageProducts($this->category_url);

        $wishlistIds =  (new WishlistRepository())->getWishlistProductsIds();

        $this->products->each(function ($product) use ($wishlistIds) {
            $product->inWishlist = in_array($product->id, $wishlistIds);
        });
        $this->setBrandNameForEachProduct();

        return ProductsListResource::collection($this->products)->response()
            ->getData(true);
    }
    public function getSizeOptions($category_url)
    {

        $sizes = (new SizeRepository())->getSizeOptionsByProductsCategory($category_url);

        return SizeOptionsListResource::collection($sizes);
    }
    private function setBrandNameForEachProduct(): void
    {
        $this->products->each(function ($product) {
            $product->brand_name = $this->brands[$product->brand_id];
        });
    }
}
