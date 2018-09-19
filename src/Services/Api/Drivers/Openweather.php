<?php
namespace App\Services\Api\Drivers;

use App\Services\Api\RequestHandler;

class Openweather extends RequestHandler
{
    const BASE = 'http://api.openweathermap.org/';

    protected function getUri(string $cityUid, string $apiKey) : string
    {
        return 'data/2.5/weather?q='.$cityUid
            .'&APPID='.$apiKey
            .'&units=metric';
    }

    protected function getBase() : string
    {
        return self::BASE;
    }
}