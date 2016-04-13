<?php


namespace Application\Domain\Entity;


class ProjectSumInfo
{
    /**
     * @return mixed
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * @param mixed $projectName
     */
    public function setProjectName($projectName)
    {
        $this->projectName = $projectName;
    }

    /**
     * @return mixed
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * @param mixed $archived
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;
    }

    public function getOrderAmount()
    {
        return $this->orderAmount;
    }

    public function setOrderAmount($orderAmount)
    {
        $this->orderAmount = $orderAmount;
    }

    /**
     * @return mixed
     */
    public function getTotalManHour()
    {
        return $this->totalManHour;
    }

    public function setTotalManHour($totalManHour)
    {
        $this->totalManHour = $totalManHour;
    }

    public function getOutsourcingCost()
    {
        return $this->outsourcingCost;
    }

    public function setOutsourcingCost($outsourcingCost)
    {
        $this->outsourcingCost = $outsourcingCost;
    }

    public function getSumEstimatedHours()
    {
        return $this->sumEstimatedHours;
    }

    public function setSumEstimatedHours($sumEstimatedHours)
    {
        $this->sumEstimatedHours = $sumEstimatedHours;
    }

    public function getSumEstimatedCost()
    {
        return $this->sumEstimatedCost;
    }

    public function setSumEstimatedCost($sumEstimatedCost)
    {
        $this->sumEstimatedCost = $sumEstimatedCost;
    }

    /**
     * @return mixed
     */
    public function getSumActualHours()
    {
        return $this->sumActualHours;
    }

    /**
     * @param mixed $sumActualHours
     */
    public function setSumActualHours($sumActualHours)
    {
        $this->sumActualHours = $sumActualHours;
    }

    /**
     * @return mixed
     */
    public function getSumActualCost()
    {
        return $this->sumActualCost;
    }

    public function setSumActualCost($sumActualCost)
    {
        $this->sumActualCost = $sumActualCost;
    }

    public function getCostCompare()
    {
        return $this->costCompare;
    }

    public function setCostCompare($costCompare)
    {
        $this->costCompare = $costCompare;
    }

    public function getBackLogUrl()
    {
        return $this->backLogUrl;
    }

    public function setBackLogUrl($backLogUrl)
    {
        $this->backLogUrl = $backLogUrl;
    }

    private $projectName;

    private $archived;

    private $orderAmount;

    private $totalManHour;

    private $outsourcingCost;

    private $sumEstimatedHours;

    private $sumEstimatedCost;

    private $sumActualHours;

    private $sumActualCost;

    private $costCompare;

    private $backLogUrl;

}