<?php

namespace App\Modules\Products\Repository;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Products\Models\Product;
use App\Modules\Products\Models\ProductImage;
use App\Modules\Products\Models\ProductSize;

class ProductSizeRepository
{

    private $productSize;

    public function __construct()
    {
        $this->productSize = new ProductSize();
    }

    public function decreaseStockSize($quantity, $size_id)
    {
        $this->productSize->where('id', $size_id)
            ->decrement('stock', $quantity);
    }
}