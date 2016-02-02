<?php


namespace Test\Repository;


use Application\Domain\Repository\IssueRepository;
use Application\Domain\Repository\ProjectRepository;
use Application\Domain\Repository\UserRepository;

final class RepositoryTest extends \PHPUnit_Framework_TestCase
{

    private $projectRepository;
    private $userRepository;
    private $issueRepository;

    public function testProjectRepository()
    {
        $this->projectRepository = new ProjectRepository();

        $projectData = $this->projectRepository->getAll();
        $this->assertNotNull($projectData);

        $projectIds = $this->projectRepository->getProjectIds();
        $this->assertNotNull($projectIds);

    }

    public function testUserRepository()
    {
        $this->userRepository = new UserRepository();

        $users = $this->userRepository->getAll();
        $this->assertNotNull($users);

        $userIds = $this->userRepository->getUserIds();
        $this->assertNotNull($userIds);
    }

    public function testIssueRepository()
    {
        $this->issueRepository = new IssueRepository();

        $issues = $this->issueRepository->getIssueByAssigneeId(3362);
        $this->assertNotNull($issues);
    }
}
