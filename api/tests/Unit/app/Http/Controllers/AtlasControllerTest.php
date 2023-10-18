<?php

namespace Tests\Unit\app\Http\Controllers;


use App\Http\Controllers\AtlasController;
use App\Http\Requests\AtlasRequest;
use App\Services\AtlasService;
use Tests\TestCase;

class AtlasControllerTest extends TestCase
{
    public function testIndex()
    {
        $array = [
            'suburb' => 'Sydney',
            'area' => 'Sydney City',
            'region' => 'Experience Sydney',
        ];

        $request = new AtlasRequest($array);

        $atlasServiceMock = $this->createMock(AtlasService::class);
        $atlasServiceMock->expects($this->once())->method('getAtlasData')->willReturn($array);
        $controller = new AtlasController($atlasServiceMock);

        $result = $controller->index($request);
        $this->assertIsArray(json_decode($result->getContent(), true));

    }
}
