<?php

namespace awaluk\NextbikeClient\Tests;

use awaluk\NextbikeClient\Collection\SystemCollection;
use awaluk\NextbikeClient\Exception\ResponseException;
use awaluk\NextbikeClient\HttpClient;
use awaluk\NextbikeClient\Nextbike;
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
}
