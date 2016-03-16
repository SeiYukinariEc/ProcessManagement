<?php


namespace Application\Domain\ValueObject;

use Ginq\Ginq;
use Zend\Json\Json;

final class OrderAmount
{
    const JSON_FILE = '/OrderAmount.json';
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

    public static function getOrderAmountByProjectKey($projectKey)
    {
        return Ginq::from(self::getAllData())
            ->where(function ($row) use ($projectKey) {
                return $row->project_key === $projectKey;
            })->select(function ($row) {
                return $row->order_amount;
            })->firstOrElse(0);
    }
}