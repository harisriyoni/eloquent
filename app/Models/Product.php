<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $table = "products";

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }
    public function riviews():HasMany{
        return $this->hasMany(Review::class, "product_id", "id");
    }
    public function like_by_customers(): BelongsToMany{
        return $this->belongsToMany(Customer::class, "customers_likes_products", "product_id", "customer_id");
    }
}
