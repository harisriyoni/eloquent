<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Support\Facades\DB;
use Tests\CreatesApplication;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use CreatesApplication;
    protected function setUp(): void
    {
        parent::setUp();
        DB::delete("delete from categories");
    }

}
