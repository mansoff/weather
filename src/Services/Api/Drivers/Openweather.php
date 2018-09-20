<?php
namespace App\Services\Api\Drivers;

use App\Services\Api\RequestHandler;

class Openweather extends RequestHandler
{
    const BASE = 'http://api.openweathermap.org/';

    /**
     * @param string $cityUid
     * @param string $apiKey
     * @return string
     */
    protected function getUri(string $cityUid, string $apiKey) : string
    {
        return 'data/2.5/weather?q='.$cityUid
            .'&APPID='.$apiKey
            .'&units=metric';
    }

    /**
     * @return string
     */
    protected function getBase() : string
    {
        return self::BASE;
    }
}