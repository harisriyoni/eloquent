<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $person = new Person();
        $person->first_name = "Deni";
        $person->last_name = "Dana";
        $person->address = new Address("babakan redo", "indramayu" ,"Indonesia", "45255");
        $person->save();
    }
}
