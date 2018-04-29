<?php

namespace awaluk\NextbikeClient;

use awaluk\NextbikeClient\Exception\ResponseException;
use awaluk\NextbikeClient\Structure\System;
use GuzzleHttp\Client as HttpClient;
use Psr\Http\Message\ResponseInterface;

class Client
{
    const API_BASE_URL = 'https://api.nextbike.net/maps/nextbike-live.json';

    private $httpClient;

    public function __construct()
    {
        $this->httpClient = new HttpClient();
    }

    /**
     * @return System[]
     * @throws ResponseException
     */
    public function getSystems(): array
    {
        $response = $this->httpClient->get(self::API_BASE_URL);
        $responseData = $this->handleResponse($response);

        $systems = [];
        foreach ($responseData->countries as $systemData) {
            $systems[] = new System($systemData);
        }

        return $systems;
    }

    private function handleResponse(ResponseInterface $response): \stdClass
    {
        if ($response->getStatusCode() !== 200) {
            throw new ResponseException('Error while get data from Nextbike API');
        }

        return json_decode($response->getBody());
    }
}
