<?php

namespace App\Modules\Products\Repository;

use App\Traits\ImageUpload;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Products\Models\Product;
use App\Modules\Categories\Models\Category;
use App\Modules\Products\Actions\GenerateProductSlug;
use App\Pages\Admin\ProductsPage\Services\StoreProductDiscountService;

class ProductRepository
{
    use ImageUpload;

    private $imagesFolder = 'products/product_';
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function getAll($records)
    {
        return $this->product->withMainProductImage()->latest()->paginate(80);
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
    public function getRelatedProducts($productId, $category_ids)
    {
        return $this->product->withRelatedProducts($productId, $category_ids)->get();
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
    }
    public function findProductBySlug($slug)
    {
        return $this->product->where('slug', $slug)->first();
    }
    public function getProduct($id)
    {
        return $this->product->with('sizes', 'categories', 'productImages')->find($id);
    }
    public function publishProduct($id)
    {
        $product = $this->getProduct($id);
        $product->update(['is_active' => true]);

        return $product;
    }

    public function updateProduct($validatedRequest, $id)
    {
        $product = $this->getProduct($id);
        $this->saveProduct($validatedRequest, $product);

        return $product;
    }

    public function deleteProduct($id)
    {
        $this->product->where('id', $id)->delete();

        $this->deleteImagesDirectory('products/product_' . $id);
    }

    public function saveProduct($request, $product)
    {
        $sizeOptions = $this->getSizeOptions($request->sizes);

        $product->details = $request->details;
        $product->info_and_care = $request->info_and_care;
        $product->brand_id = $request->brand_id;
        $product->color_id = $request->color_id;
        $product->price = $request->price;
        $product->shipping_cost = $request->shipping_cost;
        $product->discount_type = $request->discount_type;
        $product->discount_amount = $request->discount_amount;
        $product->discount_start_at = $request->discount_start_at;
        $product->discount_expires_at = $request->discount_expires_at;
        $product->discounted_price = (new StoreProductDiscountService())->getDiscountedPrice($request);
        $product->name = Str::title($request->name);
        $product->slug = (new GenerateProductSlug())->handle($request->name, $product->id);
        $product->stock = $this->getProductStock($sizeOptions);

        $product->save();

        $product->sizes()->sync($sizeOptions);
        $this->storeCategories($product, $request->category_id);

        if ($request->hasFile('productImages') || $request->mainImage) {
            $this->storeProductImages($product, $request->file('productImages'), $request->mainImage);
        }

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

    private function storeProductImages(Model $product, $productImages, $mainImage = null)
    {
        $images = [];

        $imagesFolder = $this->getImagesFolder($product->id);

        if (!is_null($mainImage)) {
            $newImageName = $this->uploadImage($mainImage, $imagesFolder);
            if (is_null($productImages) || empty($productImages)) {
                $product->productImages()->update(['is_main_image' => false]);
            }
            $product->productImages()->create([
                'image' => $newImageName,
                'is_main_image' => true,
            ]);
        }

        if (!is_null($productImages) || !empty($productImages)) {

            foreach ($productImages as $image) {
                $newImageName = $this->uploadImage($image, $imagesFolder);
                $images[] = [
                    'image' => $newImageName,
                    'is_main_image' => false,
                ];
            }

            if (is_null($mainImage)) { // if the main image is not present,  make the first image the main image
                $images[0]['is_main_image'] = true;
            }

            $product->productImages()->createMany($images);
        }
    }

    private function getImagesFolder($productId)
    {
        return  $this->imagesFolder . $productId;
    }
}
