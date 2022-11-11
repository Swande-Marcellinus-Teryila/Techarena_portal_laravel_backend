<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiResponseTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('api/students');
        $response->assertStatus(200);

        $response2 = $this->get('api/roles');
        $response2->assertStatus(200);

        $response3 = $this->get('api/departments');
        $response3->assertStatus(200);
    }
}
