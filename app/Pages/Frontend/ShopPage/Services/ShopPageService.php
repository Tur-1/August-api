<?php

namespace App\Pages\Frontend\ShopPage\Services;

use Illuminate\Support\Facades\Session;
use App\Exceptions\PageNotFoundException;
use App\Modules\Sizes\Repository\SizeRepository;
use App\Modules\Users\Repository\UserRepository;
use App\Modules\Brands\Repository\BrandRepository;
use App\Modules\Colors\Repository\ColorRepository;
use App\Modules\Products\Repository\ProductRepository;
use App\Modules\Categories\Repository\SectionRepository;
use App\Modules\Categories\Repository\CategoryRepository;
use App\Modules\Wishlist\Repository\WishlistRepository;
use App\Pages\Frontend\ShopPage\Resources\SectionsResource;
use App\Pages\Frontend\ShopPage\Resources\ColorListResource;
use App\Pages\Frontend\ShopPage\Resources\BrandsListResource;
use App\Pages\Frontend\ShopPage\Resources\ProductsListResource;
use App\Pages\Frontend\ShopPage\Resources\SizeOptionsListResource;
use App\Pages\Frontend\ShopPage\Resources\ShopPageCategoryResource;

class  ShopPageService
{
    private $category;
    private $products;
    private $brands;

    public function __construct()
    {
        $this->category = Session::get('category');
    }


    public function getBrands()
    {

        $brands = (new BrandRepository())->getBrandsByProductsCategory($this->category['id']);


        $this->brands = $brands->mapWithKeys(function ($brand) {
            return [$brand['id'] => $brand->name];
        });
        return BrandsListResource::collection($brands);
    }
    public function getColors()
    {
        $colors = (new ColorRepository())->getColorsByProductsCategory($this->category['id']);


        return ColorListResource::collection($colors);
    }
    public function getProducts()
    {
        $this->products = (new ProductRepository())->getShopPageProducts($this->category['id']);

        $wishlistIds =  (new WishlistRepository())->getWishlistProductsIds();

        $this->products->each(function ($product) use ($wishlistIds) {
            $product->inWishlist = in_array($product->id, $wishlistIds);
        });
        $this->setBrandNameForEachProduct();

        return ProductsListResource::collection($this->products)->response()
            ->getData(true);
    }
    public function getSizeOptions()
    {

        $sizes = (new SizeRepository())->getSizeOptionsByProductsCategory($this->category['id']);

        return SizeOptionsListResource::collection($sizes);
    }
    private function setBrandNameForEachProduct(): void
    {
        $this->products->each(function ($product) {
            $product->brand_name = $this->brands[$product->brand_id];
        });
    }
}
