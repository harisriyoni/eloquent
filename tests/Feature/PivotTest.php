<?php

namespace Tests\Feature;

use App\Models\Customer;
use function PHPUnit\Framework\assertNotNull;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Tests\TestCase;

class PivotTest extends TestCase
{
    public function testPivotManytoMany()
    {
        $customer = Customer::query()->find("1");
        $products = $customer->likes_products_last_week;

        foreach ($products as $product) {
            // karna menambahkan pivot dalam model kita maka di productnya otomatis ada pivot method
            $pivot = $product->pivot; //object Model Like
            assertNotNull($pivot);
            assertNotNull($pivot->customer_id);
            assertNotNull($pivot->product_id);
            assertNotNull($pivot->created_at);
            //jadi bisa ambil karna berelasi ambil customer sama product panggil saja modelnya
            assertNotNull($pivot->customers);
            assertNotNull($pivot->products);
        }
    }
}
