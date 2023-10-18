<?php

namespace Tests\Unit\app\Transformers;


use App\Transformers\AtlasTransformer;
use Tests\TestCase;

class AtlasTransformerTest extends TestCase
{

    public AtlasTransformer $transformer;

    public function setUp(): void
    {
        $this->transformer = new AtlasTransformer();
    }

    public function testTransform()
    {
        $array = [
            'suburb' => 'Sydney',
            'area' => 'Sydney City',
            'region' => 'Experience Sydney',
        ];
        $result = $this->transformer->transform($array);
        $this->assertArrayHasKey('ct', $result);
        $this->assertArrayHasKey('ar', $result);
        $this->assertArrayHasKey('rg', $result);
        $this->assertArrayHasKey('pge', $result);
        $this->assertArrayHasKey('size', $result);
    }
}
