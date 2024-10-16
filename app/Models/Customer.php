<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
    public function virtualAccount(): HasOneThrough{
        return $this->hasOneThrough([Wallet::class, VirtualAccount::class],
        "customer_id", //fk on wallets table
        "wallet_id", //fk on virtual account table
        "id", // pk on costumer table
        "id", //pk on wallet table
    );
    }
}
