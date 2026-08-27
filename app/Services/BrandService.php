<?php

namespace App\Services;

use App\Models\Brand;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
    public function updateBrand(array $data, Brand $brand, ?UploadedFile $image): Brand
    {
        return DB::transaction(function () use ($data, $brand, $image) {
            $brandName = $data['name'];

            $brand->update([
                'brand_name' => $brandName,
                'brand_slug' => Str::slug($brandName),
                'brand_description' => $data['description'] ?? null,
            ]);

            if ($image) {
                $oldImagePath = $brand->image?->path;

                $path = $image->store('brands', 'public');

                $brand->image()->updateOrCreate(
                    [],
                    [
                        'path' => $path,
                        'disk' => 'public',
                        'alt_text' => $brandName,
                    ]
                );

                if ($oldImagePath) {
                    Storage::disk('public')->delete($oldImagePath);
                }
            }

            return $brand->load('image');
        });
    }
    /**
     * Delete Brand With Logo
     */
    public function deleteBrand(Brand $brand): void
    {
        $image = $brand->image;

        if ($image && $image->path) {
            Storage::disk($image->disk ?? 'public')->delete($image->path);
        }

        DB::transaction(function () use ($brand, $image) {
            $image?->delete();
            $brand->delete();
        });
    }
}
