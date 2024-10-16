<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Customer extends Model
{
    protected $table = "customers";
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $incrementing = false;
    public $timestamps = false;

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
}
