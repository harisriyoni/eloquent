<?php

namespace Tests\Feature;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FactoryTest extends TestCase
{
   public function testFactory(){
    // $employee = Employee::factory()->programmer()->create([
    //     'id' => '1',
    //     'name' => 'Haris',
    // ]);
    // self::assertNotNull($employee);
    $employee = Employee::factory()->senior_programmer()->create([
        'id' => '2',
        'name' => 'Riyoni',
    ]);
    self::assertNotNull($employee);
   }
}
