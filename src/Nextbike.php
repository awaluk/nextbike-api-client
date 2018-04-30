<?php

namespace awaluk\NextbikeClient;

use awaluk\NextbikeClient\Collection\SystemCollection;
use awaluk\NextbikeClient\Exception\ResponseException;
use awaluk\NextbikeClient\Parser\CityById;
use awaluk\NextbikeClient\Structure\City;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class Nextbike
{
    const HTTP_STATUS_OK = 200;

    private $apiUrl = 'https://api.nextbike.net/maps/nextbike-live.json';
    private $httpClient;

    public function __construct(Client $httpClient, string $apiUrl = null)
    {
        $this->httpClient = $httpClient;

        if (!empty($apiUrl)) {
            $this->apiUrl = $apiUrl;
        }
    }

    public function getSystems(): SystemCollection
    {
        $response = $this->httpClient->get($this->apiUrl);
        $responseData = $this->handleResponse($response);

        return new SystemCollection($responseData->countries);
    }

    public function getCity(int $cityId): City
    {
        $response = $this->httpClient->get($this->apiUrl . '?city=' . $cityId);
        $responseData = $this->handleResponse($response);

        $parser = new CityById(new SystemCollection($responseData->countries), $cityId);

        return $parser->parse();
    }

    private function handleResponse(ResponseInterface $response): \stdClass
    {
        if ($response->getStatusCode() !== self::HTTP_STATUS_OK) {
            throw new ResponseException('Error while getting data from Nextbike API');
        }

        return json_decode($response->getBody());
    }
}
