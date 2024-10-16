<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
