<?php

namespace App\Pages\ProductDetailPage\Services;

use App\Exceptions\PageNotFoundException;
use App\Modules\Products\Repository\ProductRepository;
use App\Modules\Reviews\Repository\ReviewRepository;
use App\Modules\Reviews\Services\ReviewService;
use App\Pages\ProductDetailPage\Resources\ProductDetailResource;
use App\Pages\ProductDetailPage\Resources\ProductDetailImagesResource;
use App\Pages\ProductDetailPage\Resources\ProductDetailCategoriesResource;
use App\Pages\ProductDetailPage\Resources\ProductDetailReviewsResource;
use App\Pages\ProductDetailPage\Resources\ProductDetailSizeOptionsResource;
use App\Pages\ShopPage\Resources\ProductsListResource;

class  ProductDetailPageService
{

    private $productDetail;

    public function getProductDetail($productSlug)
    {


        $this->productDetail = (new ProductRepository())->getProductDetail($productSlug);

        if (is_null($this->productDetail)) {
            throw new PageNotFoundException();
        }


        return ProductDetailResource::make($this->productDetail);
    }
    public function getCategories()
    {

        return  ProductDetailCategoriesResource::collection($this->productDetail->categories);
    }
    public function getSizeOptions()
    {

        return  ProductDetailSizeOptionsResource::collection($this->productDetail->stockSizes);
    }

    public function getRelatedProducts()
    {

        return ProductsListResource::collection((new ProductRepository())
            ->getRelatedProducts(
                $this->productDetail->id,
                $this->productDetail->categories->pluck('id')->toArray()
            ));
    }
    public function getProductImages()
    {
        return  ProductDetailImagesResource::collection($this->productDetail->productImages);
    }
    public function getProductReviews()
    {
        return ProductDetailReviewsResource::collection($this->productDetail->reviews);
    }

    public function createComment($comment, $slug)
    {

        $product =  (new ProductRepository())->findProductBySlug($slug);
        if (is_null($slug) || is_null($product))  return;

        $comment = (new ReviewRepository())->createReview($comment, $product->id);

        return  $comment;
    }
}