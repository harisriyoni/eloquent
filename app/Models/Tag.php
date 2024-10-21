<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    protected $table = "tags";
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $incrementing = true;
    public $timestamps = false;

    public function products():MorphToMany{
        return $this->morphedByMany(Product::class, "taggable");
    }
    public function vouchers():MorphToMany{
        return $this->morphedByMany(Voucher::class, "taggable");
    }
}
