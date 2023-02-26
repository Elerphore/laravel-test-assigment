<?php

namespace Tests\Unit;

use Tests\TestCase;

class APITest extends TestCase
{
    public function test_sanctum_create()
    {
        $response = $this->get('/api/create', ['Accept' => 'application/json']);
        $response->assertStatus(401);
    }

    public function test_sanctum_update()
    {
        $response = $this->get('/api/update', ['Accept' => 'application/json']);
        $response->assertStatus(401);
    }

    public function test_sanctum_receive()
    {
        $response = $this->get('/api/receive', ['Accept' => 'application/json']);
        $response->assertStatus(401);
    }

    public function test_sanctum_delete()
    {
        $response = $this->withHeaders(['Accept' => 'application/json'])->post('/api/delete/1');
        $response->assertStatus(401);
    }

    public function test_sanctum_404()
    {
        $response = $this->withHeaders(['Accept' => 'application/json'])->post('/api/not_found');
        $response->assertStatus(404);
    }
}
