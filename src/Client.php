<?php

namespace awaluk\NextbikeClient;

use awaluk\NextbikeClient\Collection\SystemCollection;
use awaluk\NextbikeClient\Exception\ResponseException;
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

    public function getSystems(): SystemCollection
    {
        $response = $this->httpClient->get(self::API_BASE_URL);
        $responseData = $this->handleResponse($response);

        return new SystemCollection($responseData->countries);
    }

    private function handleResponse(ResponseInterface $response): \stdClass
    {
        if ($response->getStatusCode() !== 200) {
            throw new ResponseException('Error while get data from Nextbike API');
        }

        return json_decode($response->getBody());
    }
}
