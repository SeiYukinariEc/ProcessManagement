<?php


namespace Test;

use Application\Domain\infrastructure\Backlog;
use Application\Domain\infrastructure\BacklogException;
use Ginq\Ginq;

class test extends \PHPUnit_Framework_TestCase
{

    /** @var Backlog */
    private $backlog;

    const SPACE_NAME = 'kondate';
    const API_KEY = 'Dulbn6d36IIDl1US3XULpEKZAhvj6q78HdCgYFgHyQTqsLehhnlm6YVgXyVBDW2b';

    public function setUp()
    {
        $this->backlog =
            new Backlog(
                'kondate',
                'Dulbn6d36IIDl1US3XULpEKZAhvj6q78HdCgYFgHyQTqsLehhnlm6YVgXyVBDW2b');
    }


    public function testGetSpace()
    {
        try {
            $space = $this->backlog->space->get();
        } catch (BacklogException $e) {
            echo $e->getMessage();
        }
        $this->assertNotNull($space);
    }

    public function testGetProjectIds()
    {
        try {
            $projects = $this->backlog
                ->projects
                ->get(
                    [
                        'archived' => false,
                        'all' => true
                    ]
                );

            $projecttIds = Ginq::from($projects)
                ->select(function ($project) {
                    return $project['id'];
                }
                )
                ->toArray();

        } catch (BacklogException $e) {
            echo $e->getMessage();
        } finally {
            $this->assertNotNull($projects);
        }
    }

}