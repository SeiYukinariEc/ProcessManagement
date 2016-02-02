<?php

namespace Application\Domain\Service;

use Application\Domain\Entity\ProjectInfo;
use Application\Domain\Entity\UserInfo;
use Application\Domain\Factory\Factory;
use Application\Domain\Repository\AbstractRepository;
use Application\Domain\Repository\UserRepository;
use Ginq\Ginq;

class ProjectService
{

    public function getProjectsData()
    {

        $projects = Factory::getInstance()->getProjectRepository()->getAll();

        $result = Ginq::from($projects)
            ->select(function ($project) {
                $issues = Factory::getInstance()->getIssueRepository()->getIssueByProjectIdAndStartDate($project['id']);

                $sumThisWeekEstimatedHours =
                    Ginq::from($issues)
                        ->sum(function ($issue) {
                            return $issue['estimatedHours'];
                        });

                $sumThisWeekActualHours =
                    Ginq::from($issues)
                        ->sum(function ($issue) {
                            return $issue['actualHours'];
                        });

                $nextWeekIssues = Factory::getInstance()->getIssueRepository()->getIssueByProjectIdAndStartDate($project['id'], $week = 1);

                $sumNextWeekEstimatedHours =
                    Ginq::from($nextWeekIssues)
                        ->sum(function ($issue) {
                            return $issue['estimatedHours'];
                        });

                $sumNextWeekActualHours =
                    Ginq::from($nextWeekIssues)
                        ->sum(function ($issue) {
                            return $issue['actualHours'];
                        });

                $backlogUrl = 'https://' . AbstractRepository::SPACE_NAME . '.backlog.jp/gantt/' . $project['projectKey'];

                $projectInfo = new ProjectInfo();
                $projectInfo->setProjectName($project['name']);
                $projectInfo->setThisWeekEstimatedHours($sumThisWeekEstimatedHours);
                $projectInfo->setThisWeekActualHours($sumThisWeekActualHours);
                $projectInfo->setNextWeekEstimatedHours($sumNextWeekEstimatedHours);
                $projectInfo->setNextWeekActualHours($sumNextWeekActualHours);
                $projectInfo->setBackLogUrl($backlogUrl);
                return $projectInfo;
            })->toArray();

        return $result;
    }


}