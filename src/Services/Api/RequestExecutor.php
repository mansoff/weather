<?php
namespace App\Services\Api;

use GuzzleHttp\Client;

class RequestExecutor
{
    const TIMEOUT = 2.0;

    public function execute($baseUri, $uri, $metod = 'GET')
    {
        $client = new Client([
            'base_uri' => $baseUri,
            'timeout'  => self::TIMEOUT,
        ]);

        return $client
            ->request($metod, $uri);
    }
}