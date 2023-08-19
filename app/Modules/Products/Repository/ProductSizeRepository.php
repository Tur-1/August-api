<?php

namespace App\Modules\Products\Repository;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Products\Models\Product;
use App\Modules\Products\Models\ProductImage;
use App\Modules\Products\Models\ProductSize;

use Mavinoo\Batch\Batch;

class ProductSizeRepository
{

    private $productSize;

    public function __construct()
    {
        $this->productSize = new ProductSize();
    }
    public function decrementManyStockSize($sizes)
    {
        return batch()->update($this->productSize, $sizes, 'id');
    }
    // public function decrementStockSize($quantity, $size_id)
    // {
    //     $this->productSize->query()
    //         ->where('id', $size_id)
    //         ->decrement('stock', $quantity);
    // }
}
