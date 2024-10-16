<?php

namespace Tests\Feature;

use App\Models\Customer;
use function PHPUnit\Framework\assertNotNull;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    public function testHasOne()
    {
        $customer = Customer::query()->find("1");
        assertNotNull($customer);
        $wallet = $customer->wallet;
        assertNotNull($wallet);
        assertNotNull(10000, $wallet->amount);
        assertNotNull(1, $wallet->customer_id);
        assertNotNull(3, $wallet->id);

        // $amount = $wallet->amount;
        // assertNotNull(10000, $amount);

    }
}
