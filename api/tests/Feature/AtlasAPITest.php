<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AtlasAPITest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_endpoint_returns_a_successful_response(): void
    {
        $response = $this->get('/api/v1/atlas');

        $response->assertStatus(200);
    }

    public function test_the_endpoint_returns_a_successful_response_with_query_params(): void
    {
        $response = $this->get('/api/v1/atlas?suburb=sydney');

        $response->assertStatus(200);
    }
}
