<?php
namespace App\Services\Api;

abstract class RequestHandler
{
    /**
     * @var RequestExecutor
     */
    private $requestExecutor;

    public function __construct(
        RequestExecutor $requestExecutor
    ) {
        $this->requestExecutor = $requestExecutor;
    }

    /**
     * @param string $cityName
     * @param string $key
     * @return mixed|null
     */
    public function getCityData(string $cityName, string $key)
    {
        $response = $this->requestExecutor
            ->execute(
                $this->getBase(),
                $this->getUri($cityName, $key)
            );

        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(), true);
        }

        return null;
    }

    /**
     * @return string
     */
    abstract protected function getBase() : string;

    /**
     * @param string $cityUid
     * @param string $apiKey
     * @return string
     */
    abstract protected function getUri(string $cityUid, string $apiKey) : string;
}