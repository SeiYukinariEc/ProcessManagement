<?php


namespace Application\Domain\Repository;

final class IssueRepository extends AbstractRepository
{
    public function getIssueByAssigneeId($assigneeID)
    {
        return $this->backlog->issues->get(['assigneeId' => [$assigneeID]]);
    }

    public function getIssueByAssigneeIdAndStartDate($assigneeID, $week = 0)
    {
        $startDateSince = date('Y-m-d', strtotime($week . ' weeks last monday'));
        $startDateUntil = date('Y-m-d', strtotime($week + 1 . ' weeks last sunday'));

        return $this->backlog->issues->get(['assigneeId' => [$assigneeID], 'startDateSince' => $startDateSince, 'startDateUntil' => $startDateUntil,]);
    }

    public function getIssueByAssigneeIdAndStartMonthDate($assigneeID, $month = 0)
    {
        $startDateSince = date('Y-m-d', strtotime('first day of ' . date("Y/m/d", strtotime("+" . $month . " month"))));
        $startDateUntil = date('Y-m-d', strtotime('last day of ' . date("Y/m/d", strtotime("+" . $month . " month"))));

        return $this->backlog->issues->get(['assigneeId' => [$assigneeID], 'startDateSince' => $startDateSince, 'startDateUntil' => $startDateUntil,]);
    }

    public function getIssueByProjectIdAndStartDate($projectId, $week = 0)
    {
        $startDateSince = date('Y-m-d', strtotime($week . ' weeks last monday'));
        $startDateUntil = date('Y-m-d', strtotime($week + 1 . ' weeks last sunday'));

        return $this->backlog->issues->get(['projectId' => [$projectId], 'startDateSince' => $startDateSince, 'startDateUntil' => $startDateUntil,]);
    }

    public function getIssueByProjectIdAndStartMonthDate($projectId, $month = 0)
    {
        $startDateSince = date('Y-m-d', strtotime('first day of ' . date("Y/m/d", strtotime("+" . $month . " month"))));
        $startDateUntil = date('Y-m-d', strtotime('last day of ' . date("Y/m/d", strtotime("+" . $month . " month"))));

        return $this->backlog->issues->get(['assigneeId' => [$projectId], 'startDateSince' => $startDateSince, 'startDateUntil' => $startDateUntil,]);
    }

    public function getIssueByProjectId($projectId)
    {
        return $this->backlog->issues->get(['projectId' => [$projectId], 'count' => 100]);
    }

}