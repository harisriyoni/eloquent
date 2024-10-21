<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $product = Product::query()->first();
        $comment = new Comment();
        $comment->email = "haris@gmail.com";
        $comment->title = "Title";
        $comment->comment = "aku comment di product";
        $comment->commentable_id = $product->id;
        $comment->commentable_type = Product::class;
        $comment->save();

        $voucher = Voucher::query()->first();
        $comment = new Comment();
        $comment->email = "haris@gmail.com";
        $comment->title = "Title";
        $comment->comment = "aku comment di voucher";
        $comment->commentable_id = $voucher->id;
        $comment->commentable_type = Voucher::class;
        $comment->save();
    }
}
