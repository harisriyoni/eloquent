<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotNull;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    public function testOneToMany()
    {
        $products = Product::query()->find("1");
        assertNotNull($products);
        $products->category_id;

    }

    public function testManyofManyPolymorphic()
    {
        $products = Product::query()->first();
        $tags = $products->tags;
        assertNotNull($tags);
        // assertCount(1, $tags);
        foreach ($tags as $tag) {
            assertNotNull($tag);
            assertNotNull($tag->id);
            assertNotNull($tag->name);
        }
    }
    public function testQueryRelation()
    {
        $category = Category::query()->find("FOOD");
        assertNotNull($category);
        $products = $category->products()->where('price', '=', 100)->get();
        assertCount(1, $products);
    }
    public function testQueryAggregate()
    {
        $category = Category::query()->find("FOOD");
        assertNotNull($category);
        $productCount = $category->products()->count();
        $this->assertEquals(5, $productCount);
    }
    public function testCollection()
    {
        $product = Product::query()->get();
        assertCount(5, $product);

        $product = $product->toQuery()->where('price', 100)->get();
        assertEquals("1", $product[0]->id);
    }
}
