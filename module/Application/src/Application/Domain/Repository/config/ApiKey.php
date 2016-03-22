<?php


namespace Application\Domain\Repository\config;


use Application\Domain\ValueObject\Config;

class ApiKey
{
    public static function get()
    {
        $apiKey = getenv('API_KEY');
        return $apiKey
            ? $apiKey
            : Config::getConfigData('API_KEY');
    }
}