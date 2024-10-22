<?php

namespace Tests\Feature;

use App\Models\Person;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class PersonTest extends TestCase
{
    public function test_example(): void
    {

        $person = Person::query()->find("1");
        assertEquals("Haris Riyoni", $person->full_name);

        $person->full_name = "Jono Jini";
        $person->save();
        assertEquals("Jono", $person);
        assertEquals("Jini", $person);
    }
}
