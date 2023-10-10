<?php

namespace App\Pages\Frontend\ProductDetailPage\Services;

use Illuminate\Support\Facades\Session;
use App\Exceptions\PageNotFoundException;
use App\Modules\Reviews\Repository\ReviewRepository;
use App\Modules\Products\Repository\ProductRepository;
use App\Modules\ShoppingCart\Repository\ShoppingCartRepository;
use App\Pages\Frontend\ProductDetailPage\Resources\RelatedProductsResource;
use App\Pages\Frontend\ProductDetailPage\Resources\ProductDetailResource;
use App\Pages\Frontend\ProductDetailPage\Resources\ProductImagesResource;
use App\Pages\Frontend\ProductDetailPage\Resources\ProductReviewsResource;
use App\Pages\Frontend\ProductDetailPage\Resources\ProductSizeOptionsResource;
use App\Pages\Frontend\ProductDetailPage\Resources\ProductCategoriesResource;
use App\Pages\Frontend\ProductDetailPage\Actions\StoreCategoriesIdsInSession;

class  ProductDetailPageService
{

    private $productDetail;


    public function getProductDetail($productSlug)
    {

        $ProductRepository = (new ProductRepository());
        $this->productDetail =  $ProductRepository->getProductDetail($productSlug);

        if (is_null($this->productDetail)) {
            throw new PageNotFoundException();
        }

        (new StoreCategoriesIdsInSession())->handle($this->productDetail->categories);


        return  [
            'relatedProducts' => RelatedProductsResource::collection(
                $ProductRepository->getRelatedProducts($this->productDetail->categories->pluck('id')->toArray())
            ),
            'productDetail' => ProductDetailResource::make($this->productDetail),
        ];
    }
    public function getProductImages()
    {
        return  ProductImagesResource::collection($this->productDetail->productImages);
    }


    public function getCategories()
    {

        return  ProductCategoriesResource::collection($this->productDetail->categories);
    }
    public function getSizeOptions()
    {

        return  ProductSizeOptionsResource::collection($this->productDetail->stockSizes);
    }

    public function getRelatedProducts($product_id)
    {
        return RelatedProductsResource::collection((new ProductRepository())
            ->getRelatedProducts($product_id, Session::get('categoriesIds')));
    }

    public function getProductReviews($productId)
    {
        return  ProductReviewsResource::collection(
            (new ReviewRepository())->getProductReviews($productId)
        );
    }

    public function addToCart($request)
    {

        return (new ShoppingCartRepository())->storeCartItem($request['product_id'], $request['size_id']);
    }
}
