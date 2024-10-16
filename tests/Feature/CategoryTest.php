<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Scopes\IsActiveScope;
use Database\Seeders\CategorySeeder;

use function PHPUnit\Framework\assertCount;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotEmpty;
use function PHPUnit\Framework\assertNotNull;
use function PHPUnit\Framework\assertNull;
use function PHPUnit\Framework\assertTrue;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function testInsert()
    {
        $category = new Category();
        $category->id = "GADGET";
        $category->name = "gadget";
        $result = $category->save();
        self::assertTrue($result);
    }
    public function testMany()
    {
        $category = [];
        for ($i = 1; $i < 10; $i++) {
            $category[] = [
                "id" => "ID $i",
                "name" => "Name $i",
            ];
        }
        $result = Category::insert($category);
        self::assertTrue($result);
        $total = Category::query()->count();
        assertEquals(10, $total);
    }
    public function testFind()
    {
        $this->seed(CategorySeeder::class);
        $category = Category::query()->find("FOOD");
        self::assertNotNull($category);
        self::assertEquals("FOOD", $category->id);
        self::assertEquals("food", $category->name);
        self::assertEquals("FOOD Category", $category->description);
    }
    public function testUpdate()
    {
        $this->seed(CategorySeeder::class);
        $category = Category::find("FOOD");
        $category->name = "FOOD Update";
        $result = $category->update();
        self::assertTrue($result);
    }

    public function testSelect()
    {
        for ($i = 10; $i < 15; $i++) {
            $category = new Category();
            $category->id = "ID $i";
            $category->name = "name $i";
            $category->save();
        }
        $categories = Category::query()->whereNull("description")->get();
        self::assertEquals(5, $categories->count());
        $categories->each(function ($category) {
            self::assertNull($category->description);
        });
        $category->description = "update";
        $category->update();
    }

    public function testDelete()
    {
        $this->seed(CategorySeeder::class);
        $category = Category::find("ID 10");
        $result = $category->delete();
        self::assertTrue($result);

        $total = Category::query()->count();
        self::assertEquals(0, $total);
    }
    public function testCreatecategory(){
        $request = [
            "id"=> "Food",
            "name"=> "food",
            "description"=> "sample food"
        ];

        $category = Category::query()->create($request);
        $category->save();

        self::assertNotNull($category->id);
    }

    public function testUpdatefill(){
        $this->seed(CategorySeeder::class);

        $request = [
            "name"=> "update bro untuk name",
            "description"=> "update bro untuk description",

        ];
        $category = Category::query()->find("FOOD");
        $category->fill($request);
        $category->save();

        assertNotNull($category->id);
    }

    public function testGlobal(){
        $category = new Category();
        $category->id = "FOO";
        $category->name = "Food";
        $category->description = "Food Description";
        $category->is_active = false;
        $category->save();

        $category = Category::find("FOO");
        assertNull($category);
        $category = Category::withoutGlobalScope([IsActiveScope::class])->find("FOO");
        self::assertNotNull($category);
    }

    public function testOneTOMany(){
        // $this->seed(CategorySeeder::class);
        $category = Category::query()->find("FOOD");
        assertNotNull($category);
        $products = $category->products;
        assertNotEmpty($products);
        assertCount(5, $products);
        assertEquals("Product 1", $products->first()->name);
        $productNames = $products->pluck('name')->toArray();
        assertNotEmpty($productNames);
        assertEquals(["Product 1", "Product 2", "Product 3", "Product 4", "Product 5"], $productNames);
    }

    public function testManyThrought(){
        $category = Category::query()->find("FOOD");
        assertNotNull($category);
        $review = $category->reviews;
        assertNotNull($review);
        assertCount(3, $review);
    }
}
