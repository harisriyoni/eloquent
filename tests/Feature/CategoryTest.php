<?php

namespace Tests\Feature;

use App\Models\Category;
use Database\Seeders\CategorySeeder;

use function PHPUnit\Framework\assertEmpty;
use function PHPUnit\Framework\assertEquals;
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
    public function testFind(){
        $this->seed(CategorySeeder::class);
        $category = Category::query()->find("FOOD");
        self::assertNotNull($category);
        self::assertEquals("FOOD", $category->id);
        self::assertEquals("food",$category->name);
        self::assertEquals("FOOD Category", $category->description);
    }
    public function testUpdate(){
        $this->seed(CategorySeeder::class);
        $category = Category::find("FOOD");
        $category->name = "FOOD Update";
        $result = $category->update();
        self::assertTrue($result);
    }

    public function testSelect(){
        for ($i=10; $i < 15; $i++) {
            $category = new Category();
            $category->id = "ID $i";
            $category->name = "name $i";
            $category->save();
        }
        $categories = Category::query()->whereNull("description")->get();
        self::assertEquals(5, $categories->count());
        $categories->each(function($category){
            self::assertNull($category->description);
        });
        $category->description = "update";
        $category->update();
    }

    public function testDelete(){
        $this->seed(CategorySeeder::class);
        $category = Category::find("ID 10");
        $result = $category->delete();
        self::assertTrue($result);

        $total = Category::query()->count();
        self::assertEquals(0, $total);
    }
}
