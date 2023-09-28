<?php

namespace App\Pages\Frontend\CategoriesPage\Services;

use App\Exceptions\PageNotFoundException;
use App\Modules\Sizes\Repository\SizeRepository;
use App\Modules\Brands\Repository\BrandRepository;
use App\Modules\Colors\Repository\ColorRepository;
use App\Modules\Products\Repository\ProductRepository;

use App\Modules\Wishlist\Repository\WishlistRepository;
use App\Modules\Categories\Repository\SectionRepository;
use App\Modules\Categories\Repository\CategoryRepository;
use App\Pages\Frontend\CategoriesPage\Resources\SectionsResource;
use App\Pages\Frontend\CategoriesPage\Resources\ColorListResource;
use App\Pages\Frontend\CategoriesPage\Resources\BrandsListResource;
use App\Pages\Frontend\CategoriesPage\Resources\ProductsListResource;
use App\Pages\Frontend\CategoriesPage\Resources\CategoriesPageResource;
use App\Pages\Frontend\CategoriesPage\Resources\SizeOptionsListResource;
use App\Pages\Frontend\CategoriesPage\Resources\ShopPageCategoryResource;

class CategoriesPageService
{
    private $category;

    private $allCategories;
    private $categoryRepository;
    private $sectionRepository;
    private $category_url;
    private $products;
    private $brands;



    public function __construct($category_url = null)
    {
        $this->categoryRepository = new CategoryRepository();
        $this->sectionRepository = new SectionRepository();

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
    public function getColors($category_url)
    {
        $colors = (new ColorRepository())->getColorsByProductsCategory($category_url);


        return ColorListResource::collection($colors);
    }

    public function getShopPageTotalProducts($category_url)
    {
        return (new ProductRepository())->getShopPageTotalProducts($category_url);
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


    public function getCategoryByUrl($url)
    {
        $this->allCategories = collect($this->categoryRepository->getAllCategoriesHasProducts());

        $this->category =  $this->allCategories->where('url', $url)->first();

        if (is_null($this->category)) {
            throw new PageNotFoundException();
        }


        $parentCategory =  $this->getParentCategory($this->category->parent_id);

        $children =  $this->getCategoryChildren($this->category['id']);
        $parents = $this->allCategories->whereIn('id', $this->category->parents_ids);

        $parentChildren = [];
        if ($this->isCategoryHasNoChildren($children)) {

            $parentChildren = $this->getCategoryChildren($this->category->parent_id);
        }


        return [
            'category' => ShopPageCategoryResource::make($this->category),
            'children' =>    ShopPageCategoryResource::collection($children),
            'parentCategory' =>   $parentCategory ? ShopPageCategoryResource::make($parentCategory) : [],
            'parentChildren' => $parentChildren ? ShopPageCategoryResource::collection($parentChildren) : [],
            'parents' =>   $parents ? ShopPageCategoryResource::collection($parents) : [],
        ];
    }

    private function getCategoryChildren($category_id)
    {
        return  $this->allCategories->where("parent_id", $category_id);
    }

    private function getParentCategory($parent_id)
    {
        return  $this->allCategories->where("id", $parent_id)->first();
    }

    private function isCategoryHasNoChildren($children)
    {
        return  empty($children->toArray());
    }


    public function getSectionsWithCategories()
    {


        return CategoriesPageResource::collection(
            $this->categoryRepository->getSectionsWithCategories()
        );
    }
    public function getAllSections()
    {
        return SectionsResource::collection(
            $this->sectionRepository->getSectionsHasProducts()
        );
    }
}
