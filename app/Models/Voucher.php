<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use HasUuids, SoftDeletes;
    protected $table = "vouchers";
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $incrementing = false;
    public $timestamps = false;

    // kondisi dimana kita ingin meng sett attribute yang lain sebgai UUID seperti ini, misal kita ingin voucher_code dijadikan sebagai UUID
    public function uniqueIds(): array
    {
        return [$this->primaryKey, "voucher_code"];
    }

}
