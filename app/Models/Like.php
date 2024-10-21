<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Like extends Pivot
{
    protected $table = "customers_likes_products";
    protected $foreignKey = "customer_id";
    protected $realtedKey = "product_id";
    public $timestamps = false;

    public function customers():BelongsTo{
        return $this->belongsTo(Customer::class, "customer_id", "id");
    }

    public function products():BelongsTo{
        return $this->belongsTo(Product::class, "product_id", "id");
    }
}
