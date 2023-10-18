<?php

namespace App\Clients;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class AtlasClient
{
    public Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @throws Exception
     */
    public function get(array $params):array
    {
        try {
            $params['key'] = env('ATLAS_API_KEY');
            $query = [
                'query' => $params,
                'headers' => ['Content-Type' => 'application/json'],
            ];

            $response = $this->client->request('GET', env('ATLAS_HOST') . '/api/atlas/products', $query);
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        }

        $content = $response->getBody()->getContents();

        $toXML = simplexml_load_string($content);
        $toJson = json_encode($toXML);
        return json_decode($toJson,TRUE);
    }
}
