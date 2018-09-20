<?php
namespace App\Tests\Services\Api;

use App\Services\Api\ClientBuilder;
use PHPUnit\Framework\TestCase;

class ClientBuilderTest extends TestCase
{
    public function testBuild()
    {
        $baseUri = 'example';
        $timeOut = 1.0;

        $builder = (new ClientBuilder)->build($baseUri, $timeOut);
        $this->assertInstanceOf('GuzzleHttp\Client', $builder);
    }
}