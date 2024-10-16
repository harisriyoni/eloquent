<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $cstmr = new Customer();
        $cstmr->id = "1";
        $cstmr->name = "haris";
        $cstmr->email = "haris@gmail.com";
        $cstmr->save();
    }
}
