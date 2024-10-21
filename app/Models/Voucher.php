<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
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
    // public function uniqueIds(): array
    // {
    //     return [$this->primaryKey, "voucher_code"];
    // }
    // public function scopeActive(Builder $builder):void
    // {
    //     $builder->where("is_active", true);
    // }
    // public function scopeNonActive(Builder $builder):void
    // {
    //     $builder->where("is_active", true);
    // }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, "commentable");
    }
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, "taggable");
    }
}
