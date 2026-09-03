<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::factory()->create();

        $quantity = fake()->numberBetween(1, 10);

        $unitPrice = $product->product_discount_price ? $product->product_price - $product->product_discount_price : $product->product_price;

        return [
            'order_id' => Order::factory(),
            'product_id' => $product->id,
            'product_name' => $product->product_name,
            'unit_price' => $unitPrice,
            'quantity' => $quantity,
            'line_total' => $unitPrice * $quantity,
        ];
    }
}