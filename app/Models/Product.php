<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'category_id',
        'discount',
        'description',
        'gallery',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
