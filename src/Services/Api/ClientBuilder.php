<?php

namespace App\Services\Api;

use GuzzleHttp\Client;

class ClientBuilder
{
    /**
     * @param $baseUri
     * @param $timeOut
     *
     * @return Client
     */
    public function build($baseUri, $timeOut): Client
    {
        return new Client([
            'base_uri' => $baseUri,
            'timeout'  => $timeOut,
        ]);
    }
}
