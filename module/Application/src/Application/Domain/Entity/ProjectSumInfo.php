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
    public function getSumEstimatedHours()
    {
        return $this->sumEstimatedHours;
    }

    /**
     * @param mixed $sumEstimatedHours
     */
    public function setSumEstimatedHours($sumEstimatedHours)
    {
        $this->sumEstimatedHours = $sumEstimatedHours;
    }

    /**
     * @return mixed
     */
    public function getSumEstimatedCost()
    {
        return $this->sumEstimatedCost;
    }

    /**
     * @param mixed $sumEstimatedCost
     */
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

    /**
     * @param mixed $sumActualCost
     */
    public function setSumActualCost($sumActualCost)
    {
        $this->sumActualCost = $sumActualCost;
    }

    /**
     * @return mixed
     */
    public function getBackLogUrl()
    {
        return $this->backLogUrl;
    }

    /**
     * @param mixed $backLogUrl
     */
    public function setBackLogUrl($backLogUrl)
    {
        $this->backLogUrl = $backLogUrl;
    }
    private $projectName;

    private $sumEstimatedHours;

    private $sumEstimatedCost;

    private $sumActualHours;

    private $sumActualCost;

    private $backLogUrl;
}