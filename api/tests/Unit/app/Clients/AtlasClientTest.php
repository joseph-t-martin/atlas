<?php

namespace Tests\Unit\app\Clients;


use App\Clients\AtlasClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Tests\TestCase;

class AtlasClientTest extends TestCase
{
    public function testGet()
    {
        $array = [
            'ct' => 'Sydney',
            'ar' => 'Sydney City',
            'rg' => 'Experience Sydney',
            'pge' => 1,
            'size' => 10,
        ];

        $mock = new MockHandler([
            new Response(
                200,
                ['X-Foo' => 'Bar'],
                "<products><product_record>Test</product_record></products>"
            ),
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);
        $atlasClient = new AtlasClient($client);
        $result = $atlasClient->get($array);

        $this->assertIsArray($result);
        $this->assertArrayHasKey('product_record', $result);

    }
}
