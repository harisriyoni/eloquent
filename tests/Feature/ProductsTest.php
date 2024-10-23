<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotNull;

class ProductsTest extends TestCase
{
    // public function testOneToMany()
    // {
    //     $products = Product::query()->find("1");
    //     assertNotNull($products);
    //     $products->category_id;

    // }

    // public function testManyofManyPolymorphic()
    // {
    //     $products = Product::query()->first();
    //     $tags = $products->tags;
    //     assertNotNull($tags);
    //     // assertCount(1, $tags);
    //     foreach ($tags as $tag) {
    //         assertNotNull($tag);
    //         assertNotNull($tag->id);
    //         assertNotNull($tag->name);
    //     }
    // }
    // public function testQueryRelation()
    // {
    //     $category = Category::query()->find("FOOD");
    //     assertNotNull($category);
    //     $products = $category->products()->where('price', '=', 100)->get();
    //     assertCount(1, $products);
    // }
    // public function testQueryAggregate()
    // {
    //     $category = Category::query()->find("FOOD");
    //     assertNotNull($category);
    //     $productCount = $category->products()->count();
    //     $this->assertEquals(5, $productCount);
    // }
    // public function testCollection()
    // {
    //     $product = Product::query()->get();
    //     assertCount(5, $product);

    //     $product = $product->toQuery()->where('price', 100)->get();
    //     assertEquals("1", $product[0]->id);
    // }
    // public function testSerialization(){
    //     $product = Product::query()->get();
    //     assertCount(5, $product);
    //     // to array = tipe data array
    //     $array = $product->toArray();
    //     Log::info($array);
    //     // to json = tipe data string
    //     $json = $product->toJson(JSON_PRETTY_PRINT);
    //     Log::info($json);
    // }
    public function testSerializationRelation(){
        $product = Product::query()->get();
        assertCount(5, $product);
        $product->load(["category", "image"]);
        // to array = tipe data array
        $array = $product->toArray();
        // Log::info($array);
        // to json = tipe data string
        $json = $product->toJson(JSON_PRETTY_PRINT);
        Log::info($json);
    }
}
