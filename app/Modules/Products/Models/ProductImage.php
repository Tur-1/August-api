<?php

namespace App\Modules\Products\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $appends = ['image_url', 'image_path'];
    protected $fillable =
    [
        'product_id',
        'image',
        'is_main_image'
    ];

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->image ? config('app.url') . Storage::url('images/products/product_' . $this->product_id . '/' . $this->image) : null,
        );
    }

    protected function imagePath(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->image ?  '/products/product_' . $this->product_id . '/' . $this->image : null,
        );
    }
}