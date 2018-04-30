<?php

namespace awaluk\NextbikeClient\Tests;

use awaluk\NextbikeClient\Collection\CityCollection;
use awaluk\NextbikeClient\Collection\SystemCollection;
use awaluk\NextbikeClient\Exception\CityNotExistsException;
use awaluk\NextbikeClient\Exception\ResponseException;
use awaluk\NextbikeClient\HttpClient;
use awaluk\NextbikeClient\Nextbike;
use awaluk\NextbikeClient\Structure\City;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class NextbikeTest extends TestCase
{
    public function testGetSystems()
    {
        $httpClient = $this->getMockBuilder(HttpClient::class)
            ->setMethods(['get'])
            ->getMock();

        $httpClient->method('get')
            ->willReturn(new Response(200, [], json_encode([
                'countries' => [],
            ])));

        $nextbike = new Nextbike($httpClient);
        $systemCollection = $nextbike->getSystems();

        $this->assertInstanceOf(SystemCollection::class, $systemCollection);
        $this->assertEmpty($systemCollection->getAll());
    }

    public function testGetSystemsWhenApiError()
    {
        $this->expectException(ResponseException::class);

        $httpClient = $this->getMockBuilder(HttpClient::class)
            ->setMethods(['get'])
            ->getMock();

        $httpClient->method('get')
            ->willReturn(new Response(500, []));

        $nextbike = new Nextbike($httpClient);
        $nextbike->getSystems();
    }

    public function testGetCity()
    {
        $httpClient = $this->getMockBuilder(HttpClient::class)
            ->setMethods(['get'])
            ->getMock();

        $httpClient->method('get')
            ->willReturn(new Response(200, [], json_encode([
                'countries' => [
                    [
                        'cities' => [],
                    ],
                    [
                        'cities' => [
                            [
                                'name' => 'test'
                            ]
                        ],
                    ],
                ],
            ])));

        $nextbike = new Nextbike($httpClient);
        $city = $nextbike->getCity(1);

        $this->assertInstanceOf(City::class, $city);
        $this->assertEquals('test', $city->getName());
    }

    public function testGetCityWhenNotExists()
    {
        $this->expectException(CityNotExistsException::class);

        $httpClient = $this->getMockBuilder(HttpClient::class)
            ->setMethods(['get'])
            ->getMock();

        $httpClient->method('get')
            ->willReturn(new Response(200, [], json_encode([
                'countries' => [
                    [
                        'cities' => [],
                    ],
                    [
                        'cities' => [],
                    ],
                ],
            ])));

        $nextbike = new Nextbike($httpClient);
        $nextbike->getCity(1);
    }

    public function testGetAllCities()
    {
        $httpClient = $this->getMockBuilder(HttpClient::class)
            ->setMethods(['get'])
            ->getMock();

        $httpClient->method('get')
            ->willReturn(new Response(200, [], json_encode([
                'countries' => [
                    [
                        'cities' => [
                            [
                                'name' => 'test1'
                            ],
                            [
                                'name' => 'test2'
                            ],
                        ],
                    ],
                    [
                        'cities' => [
                            [
                                'name' => 'test3'
                            ]
                        ],
                    ],
                ],
            ])));

        $nextbike = new Nextbike($httpClient);
        $cities = $nextbike->getCities();

        $this->assertInstanceOf(CityCollection::class, $cities);
        $this->assertEquals(3, $cities->count());
    }
}
