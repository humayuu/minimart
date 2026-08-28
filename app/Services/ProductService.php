<?php

namespace App\Services;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProductService
{
    /**
     * Get Products With Paginate
     */
    public function getPaginate(int $perPage = 5)
    {
        return Product::with(['brand', 'category'])
            ->orderBy('id', 'DESC')
            ->paginate($perPage);
    }

    /**
     * Get All Brands
     */
    public function getBrands()
    {
        return Brand::orderBy('brand_name')->get();
    }

    /**
     * Get All Categories
     */
    public function getCategories()
    {
        return Category::orderBy('category_name')->get();
    }

    /**
     * For Store Products Info With Image
     */
    public function productStore(array $data, UploadedFile $image): Product
    {
        return DB::transaction(function () use ($data, $image) {
            $product = Product::create([
                'product_name' => $data['name'],
                'product_slug' => Str::slug($data['name']),
                'brand_id' => $data['brand'],
                'category_id' => $data['category'],
                'product_description' => $data['description'],
                'product_price' => $data['price'],
                'product_stock' => $data['stock'],
                'product_discount_price' => $data['discount'] == 0 ? null : $data['discount'],
                'is_active' => $data['status'],
            ]);

            $path = $image->store('products', 'public');

            $product->image()->create([
                'path' => $path,
                'disk' => 'public',
                'alt_text' => $data['name'],
            ]);

            return $product;
        });
    }

    /**
     * For Update Product Info With Image
     */
    public function productUpdate(array $data, ?UploadedFile $image, Product $product)
    {
        return DB::transaction(function () use ($data, $image, $product) {
            $oldImage = $product->image->path;
            $product->update([
                'product_name' => $data['name'],
                'product_slug' => Str::slug($data['name']),
                'brand_id' => $data['brand'],
                'category_id' => $data['category'],
                'product_description' => $data['description'],
                'product_price' => $data['price'],
                'product_stock' => $data['stock'],
                'product_discount_price' => $data['discount'] == 0 ? null : $data['discount'],
            ]);

            if ($image) {
                Storage::disk('public')->delete($oldImage);
                $path = $image->store('products', 'public');

                $product->image()->create([
                    'path' => $path,
                    'disk' => 'public',
                    'alt_text' => $data['name'],
                ]);
            }

            return $product;
        });
    }

    /**
     * For Delete Product with image
     */
    public function productDelete() {}
}
