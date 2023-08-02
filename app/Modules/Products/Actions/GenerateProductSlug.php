<?php

namespace App\Modules\Products\Actions;

use Illuminate\Support\Str;
use App\Modules\Products\Models\Product;


class GenerateProductSlug
{


    public function handle($product_name, $product_id): string
    {
        $product_slug = Str::slug($product_name);

        if (Product::where('slug', $product_slug)->where('id', '!=', $product_id)->exists()) {
            // if  product exists ? add random strings to product slug

            $product_slug .= $this->getRandomStrings();
        }

        return $product_slug;
    }

    private function getRandomStrings()
    {
        return '-' . Str::random(2) . '-' . rand(1, 100) . '-' . Str::random(1);
    }
}
