<?php
namespace App\Services\Api;

class RequestExecutor
{
    const TIMEOUT = 2.0;
    /**
     * @var ClientBuilder
     */
    private $clientBuilder;

    public function __construct(
        ClientBuilder $clientBuilder
    ) {
        $this->clientBuilder = $clientBuilder;
    }

    /**
     * @param $baseUri
     * @param $uri
     * @param string $method
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function execute($baseUri, $uri, $method = 'GET')
    {
        $client = $this->clientBuilder
            ->build($baseUri, self::TIMEOUT);

        return $client
            ->request($method, $uri);
    }
}