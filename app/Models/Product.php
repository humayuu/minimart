<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

#[Fillable(
    'brand_id',
    'category_id',
    'product_name',
    'product_slug',
    'product_description',
    'product_price',
    'product_discount_price',
    'product_stock',
    'is_active',
)]
class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;


    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
