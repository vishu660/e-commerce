<?php

// app/Models/Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;

    // ✅ Add this relationship method
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

