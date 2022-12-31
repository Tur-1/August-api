<?php

namespace App\Pages\ShopPage\Services;

use App\Exceptions\PageNotFoundException;
use App\Modules\Brands\Repository\BrandRepository;
use App\Pages\ShopPage\Resources\SectionsResource;
use App\Modules\Categories\Repository\CategoryRepository;
use App\Modules\Colors\Repository\ColorRepository;
use App\Modules\Products\Repository\ProductRepository;
use App\Modules\Sizes\Repository\SizeRepository;
use App\Pages\ShopPage\Resources\BrandsListResource;
use App\Pages\ShopPage\Resources\ColorListResource;
use App\Pages\ShopPage\Resources\ProductsListResource;
use App\Pages\ShopPage\Resources\ShopPageCategoryResource;
use App\Pages\ShopPage\Resources\SizeOptionsListResource;

class  ShopPageService
{
    private $categoryRepository;
    private $productRepository;
    private $allCategories;
    private $category;
    private $categoryParents;
    private $products;
    private $brands;

    public function __construct(CategoryRepository  $categoryRepository, ProductRepository $productRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    public function getSections()
    {
        return SectionsResource::collection($this->categoryRepository->getSections());
    }

    public function getCategory($slug)
    {

        $this->allCategories =  $this->categoryRepository->getCategoriesTree();


        $this->category = $this->allCategories->where("slug", $slug)->first();



        if (is_null($this->category)) {
            throw new PageNotFoundException('sorry page not found');
        }

        $children = $this->category['children'];

        if (empty($this->category->children->toArray())) {

            $children = ShopPageCategoryResource::make($this->allCategories->where("id", $this->category['parent_id'])->first())->resolve();

            $children = $children['children'];
        }


        return ['category' => $this->category, 'children' => $children];
    }

    public function getAllCategoryParents()
    {
        $this->categoryParents = $this->allCategories->whereIn('id', $this->category->parents_ids);

        return ShopPageCategoryResource::collection($this->categoryParents)->resolve();
    }
    public function getCategoryParent()
    {

        $categoryParent =  collect($this->categoryParents)->last();
        if (!empty($categoryParent)) {
            return ShopPageCategoryResource::make($categoryParent);
        }
        return [];
    }
    public function getBrands()
    {

        $brands = (new BrandRepository())->getBrandsByProductsCategory($this->category->id);


        $this->brands = $brands->mapWithKeys(function ($brand) {
            return [$brand->id => $brand->name];
        });
        return BrandsListResource::collection($brands);
    }
    public function getColors()
    {
        $colors = (new ColorRepository())->getColorsByProductsCategory($this->category->id);


        return ColorListResource::collection($colors);
    }
    public function getProducts()
    {
        $this->products = $this->productRepository->getShopPageProducts($this->category->id);

        $this->setBrandNameForEachProduct();
        return ProductsListResource::collection($this->products)->response()->getData(true);
    }
    public function getSizeOptions()
    {

        $sizes = (new SizeRepository())->getSizeOptionsByProductsCategory($this->category->id);

        return SizeOptionsListResource::collection($sizes);
    }
    private function setBrandNameForEachProduct(): void
    {
        $this->products->each(function ($product) {
            $product->brand_name = $this->brands[$product->brand_id];
        });
    }
}