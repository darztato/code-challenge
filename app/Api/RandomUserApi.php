<?php

declare(strict_types=1);

namespace App\Api;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use stdClass;

final class RandomUserApi
{
    public function __construct(
        public readonly Client $client,
    ) {
    }

    public function getUser(): stdClass
    {
        // $response = Http::get('https://randomuser.me/api/?nat=AU&results=100');

        // $jsonData = $response->json();

        // return $jsonData;

        $response = $this->client->request('GET', 'https://randomuser.me/api/?nat=AU&results=100', [
            'headers' => ['Content-Type' => 'application/json'],
        ])->getBody()->getContents();

        return json_decode($response);
    }

    public function importUser()
    {
        
    }
}
