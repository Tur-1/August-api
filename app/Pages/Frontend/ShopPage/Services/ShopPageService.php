<?php

namespace App\Pages\Frontend\ShopPage\Services;

use App\Exceptions\PageNotFoundException;
use App\Modules\Brands\Repository\BrandRepository;
use App\Pages\Frontend\ShopPage\Resources\SectionsResource;
use App\Modules\Categories\Repository\CategoryRepository;
use App\Modules\Categories\Repository\SectionRepository;
use App\Modules\Colors\Repository\ColorRepository;
use App\Modules\Products\Repository\ProductRepository;
use App\Modules\Sizes\Repository\SizeRepository;
use App\Pages\Frontend\ShopPage\Resources\BrandsListResource;
use App\Pages\Frontend\ShopPage\Resources\ColorListResource;
use App\Pages\Frontend\ShopPage\Resources\ProductsListResource;
use App\Pages\Frontend\ShopPage\Resources\ShopPageCategoryResource;
use App\Pages\Frontend\ShopPage\Resources\SizeOptionsListResource;
use Illuminate\Support\Facades\Session;

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

        $this->setBrandNameForEachProduct();
        return ProductsListResource::collection($this->products)->response()->getData(true);
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
