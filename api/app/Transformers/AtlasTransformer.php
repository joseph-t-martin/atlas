<?php

namespace App\Transformers;

class AtlasTransformer
{
    public function transform(array $data): array
    {
        $result = [];

        if (!empty($data['suburb'])) {
            $result['ct'] = $data['suburb'];
        }
        if (!empty($data['area'])) {
            $result['ar'] = $data['area'];
        }

        if (!empty($data['region'])) {
            $result['rg'] = $data['region'];
        }

        $result['pge'] = 1;
        if (!empty($data['page'])) {
            $result['pge'] = $data['page'];
        }

        $result['size'] = 10;
        if (!empty($data['size'])) {
            $result['size'] = $data['size'];
        }

        return $result;
    }
}
