<?php

namespace Application\Domain\Factory;

use Application\Domain\Repository\IssueRepository;
use Application\Domain\Repository\ProjectRepository;
use Application\Domain\Repository\UserRepository;
use Application\Domain\Service\ProjectService;
use Application\Domain\Service\TallyService;
use Application\Domain\Service\UserService;

class Factory
{
    private function __construct()
    {
    }

    public static function getInstance()
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new self;
        }
        return $instance;
    }

    private $userService;

    /**
     * @return UserService
     */
    public function getUserService()
    {
        if (!isset($this->userService)) {
            $this->userService = new UserService();
        }
        return $this->userService;
    }

    private $projectService;

    /**
     * @return ProjectService
     */
    public function getProjectService()
    {
        if (!isset($this->projectService)) {
            $this->projectService = new ProjectService();
        }
        return $this->projectService;
    }

    private $tallyService;

    /**
     * @return TallyService
     */
    public function getTallyService()
    {
        if (!isset($this->tallyService)) {
            $this->tallyService = new TallyService();
        }
        return $this->tallyService;
    }

    private $userRepository;

    /**
     * @return UserRepository
     */
    public function getUserRepository()
    {
        if (!isset($this->userRepository)) {
            $this->userRepository = new UserRepository();
        }
        return $this->userRepository;
    }

    private $projectRepository;

    /**
     * @return ProjectRepository
     */
    public function getProjectRepository()
    {
        if (!isset($this->projectRepository)) {
            $this->projectRepository = new ProjectRepository();
        }
        return $this->projectRepository;
    }

    private $issueRepository;

    /**
     * @return IssueRepository
     */
    public function getIssueRepository()
    {
        if (!isset($this->issueRepository)) {
            $this->issueRepository = new IssueRepository();
        }
        return $this->issueRepository;
    }

}