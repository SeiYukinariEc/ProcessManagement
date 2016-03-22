<?php


namespace Application\Domain\Repository;

use Application\Domain\infrastructure\Backlog;
use Application\Domain\Repository\config\ApiKey;
use Application\Domain\Repository\config\SpaceName;

abstract class AbstractRepository
{

    /**
     * @var Backlog
     */
    protected $backlog;
    /**
     * @var string
     */
    public static $spaceName;

    public function __construct()
    {
        self::$spaceName = SpaceName::get();
        $this->backlog = new Backlog(self::$spaceName, ApiKey::get());
    }
}