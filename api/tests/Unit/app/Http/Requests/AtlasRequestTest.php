<?php

namespace Tests\Unit\app\Http\Requests;


use App\Http\Requests\AtlasRequest;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class AtlasRequestTest extends TestCase
{
    public function testValidRequest()
    {
        $array = [
            'suburb' => 'Sydney',
            'area' => 'Sydney City',
            'region' => 'Experience Sydney',
        ];

        $request = new AtlasRequest();
        $validator = Validator::make($array, $request->rules());

        $this->assertTrue($validator->passes());
    }

    public function testInvalidRequest()
    {
        $array = [
            'suburb' => 123,
            'area' => 'Sydney City',
            'region' => 'Experience Sydney',
        ];

        $request = new AtlasRequest();
        $validator = Validator::make($array, $request->rules());

        $this->assertFalse($validator->passes());
    }
}
