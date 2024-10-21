<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Product extends Model
{
    protected $table = "products";

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, "category_id", "id");
    }
    public function riviews(): HasMany
    {
        return $this->hasMany(Review::class, "product_id", "id");
    }
    public function like_by_customers(): BelongsToMany
    {
        return $this->belongsToMany(Customer::class, "customers_likes_products", "product_id", "customer_id")->withPivot("created_at")->using(Like::class);
    }
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, "imageable");
    }
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, "commentable");
    }
    public function latest_comment(): MorphOne
    {
        return $this->morphOne(Comment::class, "commentable")->latest("created_at");
    }
    public function oldest_comment(): MorphOne
    {
        return $this->morphOne(Comment::class, "commentable")->oldest("created_at");
    }

    public function tags ():MorphToMany{
        return $this->morphToMany(Tag::class, "taggable");
    }
}
