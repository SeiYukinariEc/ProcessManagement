<?php

namespace Application\Domain\Service;

use Application\Domain\Entity\ProjectInfo;
use Application\Domain\Entity\ProjectSumInfo;
use Application\Domain\Factory\Factory;
use Application\Domain\infrastructure\Cache;
use Application\Domain\Repository\AbstractRepository;
use Application\Domain\ValueObject\Cost;
use Ginq\Ginq;

class ProjectService
{

    const CACHE_KEY_WEEK = 'week_project';

    public function getProjectsData()
    {

        $cache = Cache::getAdapter();

        $result = $cache->getItem(self::CACHE_KEY_WEEK, $success);
        if ($success) {
            return unserialize($result);
        } else {

            $projects = Factory::getInstance()->getProjectRepository()->getAll();

            $result = Ginq::from($projects)->select(function ($project) {
                $issues = Factory::getInstance()->getIssueRepository()->getIssueByProjectIdAndStartDate($project['id']);

                $sumThisWeekEstimatedHours = Ginq::from($issues)->sum(function ($issue) {
                    return $issue['estimatedHours'];
                });

                $sumThisWeekActualHours = Ginq::from($issues)->sum(function ($issue) {
                    return $issue['actualHours'];
                });

                $nextWeekIssues = Factory::getInstance()->getIssueRepository()->getIssueByProjectIdAndStartDate($project['id'], $week = 1);

                $sumNextWeekEstimatedHours = Ginq::from($nextWeekIssues)->sum(function ($issue) {
                    return $issue['estimatedHours'];
                });

                $sumNextWeekActualHours = Ginq::from($nextWeekIssues)->sum(function ($issue) {
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

            $cache->setItem(self::CACHE_KEY_WEEK, serialize($result));

        }
        return $result;
    }

    const CACHE_KEY_SUM = 'sum_project';

    public function getProjectsSumData()
    {
        $cache = Cache::getAdapter();

        $result = $cache->getItem(self::CACHE_KEY_SUM, $success);
        if ($success) {
            return unserialize($result);
        } else {
            $projects = Factory::getInstance()->getProjectRepository()->getAll();

            $result = Ginq::from($projects)->select(function ($project) {
                $issues = Factory::getInstance()->getIssueRepository()->getIssueByProjectId($project['id']);
                $estimatedHours = Ginq::from($issues)->sum(function ($issue) {
                    return $issue['estimatedHours'];
                });
                $actualHours = Ginq::from($issues)->sum(function ($issue) {
                    return $issue['actualHours'];
                });

                $backlogUrl = 'https://' . AbstractRepository::SPACE_NAME . '.backlog.jp/gantt/' . $project['projectKey'];

                $projectSumInfo = new ProjectSumInfo();
                $projectSumInfo->setProjectName($project['name']);
                $archived = ($project['archived'] === true) ? '◯' : '';
                $projectSumInfo->setArchived($archived);
                $projectSumInfo->setSumEstimatedHours($estimatedHours);
                $projectSumInfo->setSumActualHours($actualHours);
                $estimatedCost = (int)$estimatedHours * Cost::getCostPerHourPerPerson();
                $projectSumInfo->setSumEstimatedCost($estimatedCost);
                $actualCost = (int)$actualHours * Cost::getCostPerHourPerPerson();
                $projectSumInfo->setSumActualCost($actualCost);
                $projectSumInfo->setBackLogUrl($backlogUrl);
                $projectSumInfo->setCostCompare($estimatedCost - $actualCost);

                return $projectSumInfo;

            })->toArray();

            $cache->setItem(self::CACHE_KEY_SUM, serialize($result));

        }
        return $result;
    }

}