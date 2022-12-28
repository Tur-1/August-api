<?php

namespace App\Modules\Products\EloquentBuilders;

use App\Modules\Sizes\Models\Size;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use App\Modules\Products\Models\ProductImage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class ProductBuilder extends Builder
{
    public function withMainProductImage(): self
    {
        return $this->addSelect([
            'main_image' => ProductImage::select('image')
                ->whereColumn('product_id', 'products.id')
                ->where('is_main_image', true)
                ->limit(1)
        ]);
    }
}