<?php


namespace Application\Domain\Repository;

use Application\Domain\infrastructure\Backlog;

abstract class AbstractRepository
{

    /**
     * @var Backlog
     */
    protected $backlog;

    const SPACE_NAME = 'yukinari';
    const API_KEY = 'CeotBCNF38IzXJGVTlvDphl8ATqEJDnGHaK5XGJeKSTbMA6oJr13XZZTZgRNsSxd';

    public function __construct()
    {
        $this->backlog = new Backlog(self::SPACE_NAME, self::API_KEY);
    }
}