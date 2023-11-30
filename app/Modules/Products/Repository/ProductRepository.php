<?php

namespace App\Modules\Products\Repository;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Products\Models\Product;
use App\Exceptions\PageNotFoundException;
use App\Facades\FileUpload;
use App\Modules\Categories\Models\Category;
use App\Modules\Products\Actions\GenerateProductSlug;
use App\Modules\Products\Services\StoreProductImagesService;
use App\Modules\Products\Services\StoreProductDiscountService;

class ProductRepository
{

    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function getAll()
    {
        return $this->product->withMainProductImage()->latest()->paginate(12);
    }
    public function getHomePageProducts()
    {
        return $this->product->query()
            ->withMainProductImage()
            ->withBrandName()
            ->active()
            ->take(20)
            ->latest()
            ->get();
    }
    public function getRelatedProducts($category_ids)
    {
        return $this->product->withRelatedProducts($category_ids)->get();
    }
    public function getShopPageTotalProducts($category_id)
    {
        return $this->product
            ->whereHasCategory($category_id)
            ->withFilters()
            ->active()->count();
    }
    public function getShopPageProducts($category_id)
    {
        return $this->product
            ->whereHasCategory($category_id)
            ->withMainProductImage()
            ->withFilters()
            ->active()
            ->latest()
            ->paginate(10)
            ->withQueryString();
    }
    public function getProductDetail($productSlug)
    {
        return $this->product
            ->where('slug', $productSlug)
            ->with(['productImages:product_id,image', 'stockSizes', 'categories'])
            ->withBrandName()
            ->withBrandImage()
            ->active()
            ->first();
    }
    public function createProduct()
    {
        $product = new Product();

        $product->save();

        return $product;
    }
    public function findProductBySlug($slug)
    {
        return $this->product->where('slug', $slug)->first();
    }
    public function getShoppingCartProduct($id)
    {
        return $this->product->select('id', 'price')->find($id);
    }
    public function getProduct($id)
    {
        $this->product = $this->product->with('sizes', 'categories', 'productImages')->find($id);
        if (is_null($this->product)) {
            throw new PageNotFoundException();
        }

        return $this->product;
    }
    public function publishProduct($id, $value)
    {
        $product = $this->getProduct($id);
        $is_active = $value == 'true' ? 1 : 0;
        $product->update(['is_active' => $is_active]);

        return $product;
    }

    public function updateProduct($validatedRequest, $id)
    {
        $product = $this->getProduct($id);
        $this->saveProduct($validatedRequest, $product);

        return $product;
    }
    public function updateManyProductsStock(array $stock)
    {
        return batch()->update($this->product, $stock, 'id');
    }
    public function deleteProduct($id)
    {
        $this->product->where('id', $id)->delete();

        FileUpload::deleteImagesDirectory('products/product_' . $id);
    }

    public function saveProduct($request, $product)
    {


        $sizeOptions = $this->getSizeOptions($request->sizes);

        $price_after_discount =  (new StoreProductDiscountService())->getPriceAfterDiscount($request);
        $product->details = $request->details;
        $product->info_and_care = $request->info_and_care;
        $product->brand_id = $request->brand_id;

        $product->color_id = $request->color_id;
        $product->price = $request->price;
        $product->shipping_cost = $request->shipping_cost;
        $product->name = Str::title($request->name);
        $product->slug = (new GenerateProductSlug())->handle($request->name, $product->id);
        $product->stock = $this->getProductStock($sizeOptions);
        $product->discount = [
            'price_after_discount' =>  $price_after_discount,
            'type' => $request->discount_type,
            'amount' => $request->discount_amount,
            'start_at' => $request->discount_start_at,
            'expires_at' => $request->discount_expires_at,
        ];
        $product->save();

        $product->sizes()->sync($sizeOptions);

        $this->storeCategories($product, $request->category_id);

        (new StoreProductImagesService())->store($product, $request->product_images);


        return $product;
    }



    private function getSizeOptions($sizeOptionsRequest): array
    {
        $sizeOptions = [];
        foreach ($sizeOptionsRequest as $size) {

            $sizeOptions[$size['size_id']] = ['size_id' => $size['size_id'], 'stock' => $size['stock']];
        }

        return $sizeOptions;
    }

    private function storeCategories(Model $product, $category_id): void
    {
        $category = Category::where('id', $category_id)->first();
        $parents_ids = $category['parents_ids'];

        $parents_ids[] = $category['id'];
        $parents_ids = array_unique($parents_ids);

        $product->categories()->sync($parents_ids);
    }

    private function getProductStock($sizeOptions)
    {
        return collect($sizeOptions)->sum('stock');
    }
}
