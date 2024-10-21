<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Product;
use Tests\TestCase;

use function PHPUnit\Framework\assertNotNull;

class PolymorpTest extends TestCase
{
    public function test_example(): void
    {
        $customer = Customer::query()->find("1");
        assertNotNull($customer);
        $image = $customer->image;
        assertNotNull($image);
        assertNotNull("https://harisriyoni.me/image/1.jpg", $image->url);
    }
    public function testonetoOnePolymorph(): void
    {
        $product = Product::query()->find("1");
        assertNotNull($product);
        $image = $product->image;
        assertNotNull($image);
        assertNotNull("https://harisriyoni.me/image/1.jpg", $image->url);
    }
}
