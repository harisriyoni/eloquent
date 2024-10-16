<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    protected $table = "categories";
    protected $primarykey = "id";
    protected $KeyType = "string";
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'description',
    ];
    // public static function booted(){
    //     parent::booted();
    //     self::addGlobalScope(new IsActiveScope());
    // }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, "category_id", "id");
    }
    public function cheapest_products(): HasOne
    {
        return $this->hasOne(Product::class, "category_id", "id")->oldest('price');
    }
    public function mostexpensive_products(): HasOne
    {
        return $this->hasOne(Product::class, "category_id", "id")->latest('price');
    }
    public function reviews(): HasManyThrough
    {
        return $this->hasManyThrough(Review::class, Product::class, // dia punya banyak review dia melewati table product untuk mengakses
            "category_id", // on products table
            "product_id", //fk on review table
            "id", // pk on categories table
            "id" // pk on product table
        );
    }
}
