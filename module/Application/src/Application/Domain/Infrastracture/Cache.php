<?php


namespace Application\Domain\infrastructure;

use Zend\Cache\Storage\Adapter\Filesystem;

class Cache
{
    /**
     * @param int $ttl
     * @return Filesystem
     */
    public static function getAdapter($ttl = 14400)
    {
        $cache = new Filesystem();
        $cache->getOptions()->setTtl($ttl);
        return $cache;
    }
}