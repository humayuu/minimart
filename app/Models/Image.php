<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(
    'path',
    'disk',
    'alt_text',
    'imageable_id',
    'imageable_type',
)]
class Image extends Model
{
    public function imageable()
    {
        return $this->morphTo();
    }
}
