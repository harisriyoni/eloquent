<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $primarykey = "id";
    protected $KeyType = "string";
    public $incrementing = false;
    public $timestamp = false;
    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at',
    ];
}
