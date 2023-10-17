<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtlasRequest;
use App\Services\AtlasService;

class AtlasController extends Controller
{
    protected AtlasService $atlasService;

    public function __construct(AtlasService $atlasService)
    {
        $this->atlasService = $atlasService;
    }

    public function index(AtlasRequest $request)
    {
        $this->atlasService->getAtlasData($request->all());
    }
}
