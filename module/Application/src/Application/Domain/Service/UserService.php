<?php

namespace Application\Domain\Service;

use Application\Domain\Entity\UserDetail;
use Application\Domain\Entity\UserInfo;
use Application\Domain\Factory\Factory;
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

                $detailUrl = 'member/detail?id=' . $member['id'];

                $userInfo = new UserInfo();
                $userInfo->setUserId($member['id']);
                $userInfo->setUserName($member['name']);
                $userInfo->setThisWeekEstimatedHours($sumThisWeekEstimatedHours);
                $userInfo->setThisWeekActualHours($sumThisWeekActualHours);
                $userInfo->setNextWeekEstimatedHours($sumNextWeekEstimatedHours);
                $userInfo->setNextWeekActualHours($sumNextWeekActualHours);
                $userInfo->setDetailUrl($detailUrl);
                return $userInfo;
            })->toArray();

        return $result;
    }

    public function getMemberDetailData($userId)
    {
        $issues = Factory::getInstance()->getIssueRepository()->getIssueByAssigneeIdAndStartDate($userId);

        $result = Ginq::from($issues)
            ->select(function ($issue) {
                $project = Factory::getInstance()->getProjectRepository()->getProjectByPk($issue['projectId']);
                $userDetail = new UserDetail();
                $userDetail->setProjectName($project['name']);
                $userDetail->setThisWeekEstimatedHours($issue['estimatedHours']);
                $userDetail->setThisWeekEstimatedHours($issue['actualHours']);
                $userDetail->setSummary($issue['summary']);
                $userDetail->setPriority($issue['priority']['name']);
                $userDetail->setStatus($issue['status']['name']);
                return $userDetail;
            })->toArray();

        return $result;
    }

}