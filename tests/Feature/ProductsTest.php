<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertNotNull;

class ProductsTest extends TestCase
{
    public function testOneToMany(){
        $products = Product::query()->find("1");
        assertNotNull($products);
        $products->category_id;

    }

    public function testManyofManyPolymorphic(){
        $products = Product::query()->first();
        $tags = $products->tags;
        assertNotNull($tags);
        // assertCount(1, $tags);
        foreach($tags as $tag){
            assertNotNull($tag);
            assertNotNull($tag->id);
            assertNotNull($tag->name);
        }
    }
}
