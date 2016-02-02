<?php


namespace Application\Domain\Repository;

use Application\Domain\infrastructure\Backlog;

abstract class AbstractRepository
{

    /**
     * @var Backlog
     */
    protected $backlog;

    const SPACE_NAME = 'kondate';
    const API_KEY = 'Dulbn6d36IIDl1US3XULpEKZAhvj6q78HdCgYFgHyQTqsLehhnlm6YVgXyVBDW2b';

    public function __construct()
    {
        $this->backlog = new Backlog(self::SPACE_NAME, self::API_KEY);
    }
}