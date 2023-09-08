<?php

namespace App\Pages\Frontend\ProductDetailPage\Actions;

use App\Modules\Reviews\Repository\ReviewRepository;
use App\Modules\Products\Repository\ProductRepository;
use Exception;

class CreateCommentAction
{
    public function handle(string $comment, string $product_slug)
    {
        $product =  (new ProductRepository())->findProductBySlug($product_slug);
        if (is_null($product)) {
            return;
        }

        return (new ReviewRepository())->createReview($comment, $product->id);
    }
}
