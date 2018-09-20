<?php

namespace App\Tests\Services\Api;

use App\Services\Api\ClientBuilder;
use App\Services\Api\RequestExecutor;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class RequestExecutorTest extends TestCase
{
    /**
     * @var RequestExecutor
     */
    protected $testObj;

    /**
     * @var ClientBuilder
     */
    protected $clientBuilder;

    public function setUp()
    {
        $this->clientBuilder = $this->createMock(ClientBuilder::class);
        $this->testObj = new RequestExecutor(
            $this->clientBuilder
        );
    }

    public function testExecute()
    {
        $baseUri = 'http://example.test/';
        $uri = 'api/foo/bar';

        $response = new Response(200, ['X-Foo' => 'Bar']);
        $mock = new MockHandler([
            $response,
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $this->clientBuilder->expects($this->once())
            ->method('build')
            ->willReturn($client);

        $this->assertEquals(
            $response,
            $this->testObj->execute($baseUri, $uri)
        );
    }
}