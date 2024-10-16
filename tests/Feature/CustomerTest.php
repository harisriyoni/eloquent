<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Wallet;

use function PHPUnit\Framework\assertNotNull;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    // public function testHasOne()
    // {
    //     $customer = Customer::query()->find("1");
    //     assertNotNull($customer);
    //     $wallet = $customer->wallet;
    //     assertNotNull($wallet);
    //     assertNotNull(10000, $wallet->amount);
    //     assertNotNull(1, $wallet->customer_id);
    //     assertNotNull(3, $wallet->id);

    //     // $amount = $wallet->amount;
    //     // assertNotNull(10000, $amount);
    // }
    // public function testOneToOne(){
    //     $customer = new Customer();
    //     $customer->id = 2;
    //     $customer->name = "riyoni";
    //     $customer->email = "riyoni@gmail.com";
    //     $customer->save();

    //     $wallets = new Wallet();
    //     $wallets->amount = 100000;
    //     $customer->wallet()->save($wallets);

    // }

    public function testOneThourght(){
        $customer = Customer::query()->find("1");
        assertNotNull($customer);
        $va = $customer->virtual_account;
        self::assertNotNull($va);
        self::assertEquals("BCA", $va->bank);
    }
}
