<?php

namespace Application\Domain\Service;

use Application\Domain\Entity\UserInfo;
use Application\Domain\Factory\Factory;
use Application\Domain\Repository\UserRepository;
use Ginq\Ginq;

class UserService
{

    public function getMembersData()
    {

        $members = Factory::getInstance()->getUserRepository()->getAll();

        $result = Ginq::from($members)
            ->select(function ($member) {
                $thisWeekIssues = Factory::getInstance()->getIssueRepository()->getIssueByAssigneeIdAndStartDate($member['id']);

                $sumThisWeekEstimatedHours =
                    Ginq::from($thisWeekIssues)
                        ->sum(function ($issue) {
                            return $issue['estimatedHours'];
                        });

                $sumThisWeekActualHours =
                    Ginq::from($thisWeekIssues)
                        ->sum(function ($issue) {
                            return $issue['actualHours'];
                        });

                $nextWeekIssues = Factory::getInstance()->getIssueRepository()->getIssueByAssigneeIdAndStartDate($member['id'], $week = 1);

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

                $userInfo = new UserInfo();
                $userInfo->setUserName($member['name']);
                $userInfo->setThisWeekEstimatedHours($sumThisWeekEstimatedHours);
                $userInfo->setThisWeekActualHours($sumThisWeekActualHours);
                $userInfo->setNextWeekEstimatedHours($sumNextWeekEstimatedHours);
                $userInfo->setNextWeekActualHours($sumNextWeekActualHours);
                return $userInfo;
            })->toArray();

        return $result;
    }


}