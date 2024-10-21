<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Date;

class Customer extends Model
{
    protected $table = "customers";
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $incrementing = false;
    public $timestamps = true;

    public function wallet(): HasOne
    {
        return $this->hasOne(Wallet::class, "customer_id", "id");
    }
    public function virtual_account(): HasOneThrough
    {
        return $this->hasOneThrough(VirtualAccount::class, Wallet::class,
            'customer_id', // FK di tabel wallets (dari Wallet)
            'wallet_id', // FK di tabel virtual accounts (dari VirtualAccount)
            'id', // PK di tabel customers (dari Customer)
            'id' // PK di tabel wallets (dari Wallet)
        );
    }

    public function riviews(): HasMany
    {
        return $this->hasMany(Review::class, "customer_id", "id");
    }

    public function likes_products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, "customers_likes_products", "customer_id", "product_id")->withPivot("created_at")->using(Like::class);
    }
    public function likes_products_last_week(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, "customers_likes_products", "customer_id", "product_id")->withPivot("created_at")->wherePivot("created_at", ">=", Date::Now()->addDays(-7))->using(Like::class);
    }
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, "imageable");
    }
}
