<?php

namespace Application\Domain\Entity;

class UserInfo
{
    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
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

    private $userName;

    private $thisWeekEstimatedHours;

    private $thisWeekActualHours;

    private $nextWeekEstimatedHours;

    private $nextWeekActualHours;


}