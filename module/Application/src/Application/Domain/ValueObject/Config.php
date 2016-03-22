<?php


namespace Application\Domain\ValueObject;

use Ginq\Ginq;
use Zend\Json\Json;

class Config
{
    const JSON_FILE = '/config.json';
    public static $allData;

    public static function getAllData()
    {
        if (!isset(self::$allData)) {
            $file = dirname(__FILE__) . '/' . self::JSON_FILE;
            if (file_exists($file)) {
                self::$allData = Json::decode(file_get_contents($file));
            }
        }
        return self::$allData;
    }

    public static function getConfigData($key)
    {
        return Ginq::from(self::getAllData())
            ->select(function ($row) use ($key) {
                return $row->$key;
            })
            ->firstOrElse('');
    }
}