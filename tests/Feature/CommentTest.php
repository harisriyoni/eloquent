<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Product;
use Tests\TestCase;

use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertEquals;

class CommentTest extends TestCase
{
    public function testComment()
    {
        $comment = new Comment();
        $comment->email = "haris@gmail.com";
        $comment->title = "hayuu Title";
        $comment->comment = "hayuu Comment";
        $comment->save();

        $this->assertDatabaseHas('comments', [
            'email' => 'haris@gmail.com',
            'title' => 'hayuu Title',
            'comment' => 'hayuu Comment',
        ]);
    }

    public function testDefault()
    {
        $comment = new Comment();
        $comment->email = "haris@gmail.com";
        $comment->save();
        $this->assertEquals("Sample Title", $comment->title);
    }
    public function testOnetoManyPolymorphic()
    {
        $product = Product::query()->first();
        $comment = $product->comments;
        assertCount(1, $comment);

        foreach ($comment as $cm){
            assertEquals(Product::class, $cm->commentable_type);
            assertEquals($product->id, $cm->commentable_id);
        }

    }
}
