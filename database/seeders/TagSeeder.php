<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Tag;
use App\Models\Voucher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tag = new Tag();
        $tag->id = "1";
        $tag->name = "Branded";
        $tag->save();

        $product = Product::query()->first();
        $product->tags()->attach($tag);
        $voucher = Voucher::query()->first();
        $voucher->tags()->attach($tag);

    }
}
