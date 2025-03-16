<?php

namespace Tests\Unit;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_basic_function()
    {
        $response = (new \App\Http\Controllers\ExampleController)->sayHello();

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertJson($response->getContent());
    }
}
