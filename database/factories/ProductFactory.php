<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(3, true);

        $price = fake()->randomFloat(2, 500, 100000);

        return [
            'brand_id' => Brand::factory(),
            'category_id' => Category::factory(),

            'product_name' => $name,
            'product_slug' => Str::slug($name),

            'product_description' => fake()->paragraph(),

            'product_price' => $price,
            'product_discount_price' => fake()->randomFloat(
                2,
                100,
                $price
            ),

            'product_stock' => fake()->numberBetween(0, 500),

            'is_active' => fake()->boolean(90),
        ];
    }
}