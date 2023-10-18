<?php

namespace App\Services;

use App\Clients\AtlasClient;
use App\Transformers\AtlasTransformer;
use Exception;

class AtlasService
{
    protected AtlasClient $atlasClient;
    protected AtlasTransformer $atlasTransformer;

    public function __construct(AtlasTransformer $atlasTransformer, AtlasClient $atlasClient)
    {
        $this->atlasTransformer = $atlasTransformer;
        $this->atlasClient = $atlasClient;
    }

    /**
     * @throws Exception
     */
    public function getAtlasData(array $data): array
    {
        $params = $this->atlasTransformer->transform($data);
        return $this->atlasClient->get($params);
    }
}
