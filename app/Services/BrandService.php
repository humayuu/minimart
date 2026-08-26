<?php

namespace App\Services;

use App\Models\Brand;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandService
{

    /**
     * Get paginate Brand
     */
    public function getPaginate(int $perPage = 5)
    {
        return Brand::orderBy('id', 'DESC')->paginate($perPage);
    }


    /**
     * Create brand with logo.
     */
    public function createBrand(array $data, UploadedFile $image): Brand
    {
        return DB::transaction(function () use ($data, $image) {

            $brandName = $data['name'];

            $brand = Brand::create([
                'brand_name' => $brandName,
                'brand_slug' => Str::slug($brandName),
                'brand_description' => $data['description'] ?? null,
            ]);

            $path = $image->store('brands', 'public');

            $brand->image()->create([
                'path' => $path,
                'disk' => 'public',
                'alt_text' => $brandName,
            ]);

            return $brand->load('image');
        });
    }

    /**
     * Update brand with logo.
     */
    public function updateBrand(array $data, UploadedFile $image): Brand
    {
        return DB::transaction(function () use ($data, $image) {

            $brandName = $data['name'];

            $brand = Brand::create([
                'brand_name' => $brandName,
                'brand_slug' => Str::slug($brandName),
                'brand_description' => $data['description'] ?? null,
            ]);

            $path = $image->store('brands', 'public');

            $brand->image()->create([
                'path' => $path,
                'disk' => 'public',
                'alt_text' => $brandName,
            ]);

            return $brand->load('image');
        });
    }
}
