<?php

declare(strict_types=1);

namespace App\Api;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use stdClass;

class RandomUserApi
{
    public function __construct(
        public readonly Client $client,
    ) {
    }

    public function getUser(
        string $nat = 'AU',
        int $results = 100
    ): ?stdClass {
        $response = $this->client->request('GET', 'https://randomuser.me/api/', [
            'headers' => ['Content-Type' => 'application/json'],
            'query' => [
                'nat' => $nat,
                'results' => $results
            ]
        ])->getBody()->getContents();

        return json_decode($response);
    }
}
