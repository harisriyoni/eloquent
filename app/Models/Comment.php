<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    protected $table = "comments";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $incrementing = true;
    public $timestamps = true;
//untuk mengatur default value
    protected $attributes = [
        "title" => "Sample Title",
        "comment" => "Sample Comment",
    ];
    public function commentabel():MorphTo{
        return $this->morphTo();
    }
}
