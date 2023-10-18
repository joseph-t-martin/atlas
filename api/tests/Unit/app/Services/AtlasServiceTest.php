<?php

namespace Tests\Unit\app\Services;


use App\Clients\AtlasClient;
use App\Services\AtlasService;
use App\Transformers\AtlasTransformer;
use Tests\TestCase;

class AtlasServiceTest extends TestCase
{
    public function testGetAtlasData()
    {
        $atlasTransformerMock = $this->createMock(AtlasTransformer::class);
        $atlasTransformerMock->expects($this->once())->method('transform')->willReturn(['ct' => 'Sydney']);

        $atlasClientMock = $this->createMock(AtlasClient::class);
        $atlasClientMock->expects($this->once())->method('get')->willReturn(['test' => 'data']);
        $service = new AtlasService($atlasTransformerMock, $atlasClientMock);

        $result = $service->getAtlasData(['suburb' => 'Sydney']);
        $this->assertArrayHasKey('test', $result);

    }
}
