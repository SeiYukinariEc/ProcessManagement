<?php


namespace Application\Domain\Repository\config;


use Application\Domain\ValueObject\Config;

class SpaceName
{
    public static function get()
    {
        $spaceName = getenv('SPACE_NAME');
        return $spaceName
            ? $spaceName
            : Config::getConfigData('SPACE_NAME');
    }
}