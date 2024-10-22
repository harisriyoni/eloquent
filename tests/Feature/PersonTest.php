<?php

namespace Tests\Feature;

use App\Models\Person;
use Carbon\Carbon;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertInstanceOf;

class PersonTest extends TestCase
{
    public function test_example(): void
    {

        $person = Person::query()->find("1");
        assertInstanceOf(Carbon::class, $person->created_at);
        // assertEquals("Haris Riyoni", $person->full_name);

        // $person->full_name = "Jono Jini";
        // $person->save();
        // assertEquals("Jono", $person);
        // assertEquals("Jini", $person);

    }
}
