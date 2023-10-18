<?php

namespace App\Http\Controllers;

use App\Http\Requests\AtlasRequest;
use App\Services\AtlasService;
use Illuminate\Http\JsonResponse;

class AtlasController extends Controller
{
    protected AtlasService $atlasService;

    public function __construct(AtlasService $atlasService)
    {
        $this->atlasService = $atlasService;
    }

    public function index(AtlasRequest $request): JsonResponse
    {
        $result = $this->atlasService->getAtlasData($request->all());
        return response()->json($result);
    }
}
