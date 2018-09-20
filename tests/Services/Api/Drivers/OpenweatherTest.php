<?php
namespace App\Tests\Services\Api\Drivers;

use App\Services\Api\Drivers\Openweather;
use App\Services\Api\RequestExecutor;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class OpenweatherTest extends TestCase
{
    /** @var  MockObject */
    protected $requestExecutor;

    /**
     * @var Openweather
     */
    protected $testObj;

    public function setUp()
    {
        $this->requestExecutor = $this->createMock(RequestExecutor::class);
        $this->testObj = new Openweather(
            $this->requestExecutor
        );
    }

    public function testGetCityData()
    {
        $cityName = 'DefaultCity';
        $key = 'abc';
        $body = ['foo1', 'bar2'];

        $this->requestExecutor
            ->expects($this->once())
            ->method('execute')
            ->willReturn(
                (new Response(
                    200,
                    ['foo' => 'bar'],
                    json_encode($body)
                ))
            );
        $result = $this->testObj
            ->getCityData($cityName, $key);

        $this->assertEquals($body, $result);
    }

    public function testGetNoCityData()
    {
        $cityName = 'DefaultCity';
        $key = 'abc';

        $this->requestExecutor
            ->expects($this->once())
            ->method('execute')
            ->willReturn(
                (new Response(500))
            );
        $result = $this->testObj
            ->getCityData($cityName, $key);

        $this->assertEquals(null, $result);
    }
}