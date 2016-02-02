<?php


namespace Application\Domain\Repository;

final class IssueRepository extends AbstractRepository
{
    public function getIssueByAssigneeId($assigneeID)
    {
        return $this->backlog->issues->get(
            [
                'assigneeId' => [$assigneeID]
            ]
        );
    }

    public function getIssueByAssigneeIdAndStartDate($assigneeID, $week = 0)
    {
        $startDateSince = date('Y-m-d', strtotime($week . ' weeks last monday'));
        $startDateUntil = date('Y-m-d', strtotime($week + 1 . ' weeks last sunday'));

        return $this->backlog->issues->get(
            [
                'assigneeId' => [$assigneeID],
                'startDateSince' => $startDateSince,
                'startDateUntil' => $startDateUntil,
            ]
        );
    }

    public function getIssueByProjectIdAndStartDate($projectId, $week = 0)
    {
        $startDateSince = date('Y-m-d', strtotime($week . ' weeks last monday'));
        $startDateUntil = date('Y-m-d', strtotime($week + 1 . ' weeks last sunday'));

        return $this->backlog->issues->get(
            [
                'projectId' => [$projectId],
                'startDateSince' => $startDateSince,
                'startDateUntil' => $startDateUntil,
            ]
        );
    }

}