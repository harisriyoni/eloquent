<?php

namespace Database\Seeders;

use App\Models\Wallet;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    public function run(): void
    {
        $wallet = new Wallet();
        $wallet->amount = 10000;
        $wallet->customer_id = "1";
        $wallet->save();
    }
}
