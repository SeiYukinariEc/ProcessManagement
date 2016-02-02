<?php


namespace Application\Domain\Entity;


class ProjectInfo
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
    public function getThisWeekEstimatedHours()
    {
        return $this->thisWeekEstimatedHours;
    }

    /**
     * @param mixed $thisWeekEstimatedHours
     */
    public function setThisWeekEstimatedHours($thisWeekEstimatedHours)
    {
        $this->thisWeekEstimatedHours = $thisWeekEstimatedHours;
    }

    /**
     * @return mixed
     */
    public function getThisWeekActualHours()
    {
        return $this->thisWeekActualHours;
    }

    /**
     * @param mixed $thisWeekActualHours
     */
    public function setThisWeekActualHours($thisWeekActualHours)
    {
        $this->thisWeekActualHours = $thisWeekActualHours;
    }

    /**
     * @return mixed
     */
    public function getNextWeekEstimatedHours()
    {
        return $this->nextWeekEstimatedHours;
    }

    /**
     * @param mixed $nextWeekEstimatedHours
     */
    public function setNextWeekEstimatedHours($nextWeekEstimatedHours)
    {
        $this->nextWeekEstimatedHours = $nextWeekEstimatedHours;
    }

    /**
     * @return mixed
     */
    public function getNextWeekActualHours()
    {
        return $this->nextWeekActualHours;
    }

    /**
     * @param mixed $nextWeekActualHours
     */
    public function setNextWeekActualHours($nextWeekActualHours)
    {
        $this->nextWeekActualHours = $nextWeekActualHours;
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

    private $thisWeekEstimatedHours;

    private $thisWeekActualHours;

    private $nextWeekEstimatedHours;

    private $nextWeekActualHours;

    private $backLogUrl;
}