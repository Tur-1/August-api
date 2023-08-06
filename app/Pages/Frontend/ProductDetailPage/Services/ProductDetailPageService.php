<?php

namespace App\Pages\Frontend\ProductDetailPage\Services;

use Illuminate\Support\Facades\Session;
use App\Exceptions\PageNotFoundException;
use App\Modules\Reviews\Services\ReviewService;
use App\Modules\Reviews\Repository\ReviewRepository;
use App\Modules\Products\Repository\ProductRepository;
use App\Modules\ShoppingCart\Repository\ShoppingCartRepository;
use App\Pages\Frontend\ShopPage\Resources\ProductsListResource;
use App\Pages\Frontend\ProductDetailPage\Resources\ProductDetailResource;
use App\Pages\Frontend\ProductDetailPage\Actions\StoreCategoriesIdsInSession;
use App\Pages\Frontend\ProductDetailPage\Resources\ProductDetailImagesResource;
use App\Pages\Frontend\ProductDetailPage\Resources\ProductDetailReviewsResource;
use App\Pages\Frontend\ProductDetailPage\Resources\ProductDetailCategoriesResource;
use App\Pages\Frontend\ProductDetailPage\Resources\ProductDetailSizeOptionsResource;

class  ProductDetailPageService
{

    private $productDetail;


    public function getProductDetail($productSlug)
    {


        $this->productDetail = (new ProductRepository())->getProductDetail($productSlug);

        if (is_null($this->productDetail)) {
            throw new PageNotFoundException();
        }

        (new StoreCategoriesIdsInSession())->handle($this->productDetail->categories);

        return ProductDetailResource::make($this->productDetail);
    }
    public function getProductImages()
    {
        return  ProductDetailImagesResource::collection($this->productDetail->productImages);
    }


    public function getCategories()
    {

        return  ProductDetailCategoriesResource::collection($this->productDetail->categories);
    }
    public function getSizeOptions()
    {

        return  ProductDetailSizeOptionsResource::collection($this->productDetail->stockSizes);
    }

    public function getRelatedProducts($product_id)
    {
        return ProductsListResource::collection((new ProductRepository())
            ->getRelatedProducts($product_id, Session::get('categoriesIds')));
    }

    public function getProductReviews($productId)
    {
        return  ProductDetailReviewsResource::collection(
            (new ReviewRepository())->getProductReviews($productId)
        );
    }
    public function createComment($comment, $productid)
    {

        $comment = (new ReviewRepository())->createReview($comment, $productid);

        return  $comment;
    }
    public function addToCart($request)
    {

        (new ShoppingCartRepository())->storeCartItem($request['product_id'], $request['size_id']);
    }

    public function storeProductDetailInSession($request)
    {
        Session::remove('productDetailCartItem');
        Session::put('productDetailCartItem', [
            'product_id' => $request->product_id,
            'size_id' => $request->size_id
        ]);
    }

    public function storeUserCommentInSession($productid, $comment)
    {
        Session::remove('productComment');
        Session::put('productComment', [
            'product_id' => $productid,
            'comment' => $comment,
        ]);
    }
}
