<?php

namespace Tests\Feature;

use App\Models\Comment;
use Carbon\Carbon;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
   public function testComment(){
    $comment = new Comment();
    $comment->email = "haris@gmail.com";
    $comment->title = "Sample Title";
    $comment->comment = "Sample Comment";
    $comment->save();

    $this->assertDatabaseHas('comments', [
        'email' => 'haris@gmail.com',
        'title' => 'Sample Title',
        'comment' => 'Sample Comment',
    ]);
   }
}
