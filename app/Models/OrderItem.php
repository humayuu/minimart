<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(
    'order_id',
    'product_id',
    'product_name',
    'unit_price',
    'quantity',
    'line_total',
)]
class OrderItem extends Model
{
    /** @use HasFactory<\Database\Factories\OrderItemFactory> */
    use HasFactory;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}