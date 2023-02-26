<?php

namespace Tests\Unit;

use Tests\TestCase;

class WebTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create() {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_update() {
        $response = $this->get('/update');
        $response->assertStatus(200);
    }

    public function test_crud() {
        $response = $this->get('/crud');
        $response->assertStatus(200);
    }

    public function test_logs() {
        $response = $this->get('/logs');
        $response->assertStatus(200);
    }
}
