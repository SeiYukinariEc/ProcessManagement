<?php

namespace Application\ViewModel;

use Application\Domain\Factory\Factory;
use Application\Domain\ValueObject\Cost;
use Zend\View\Model\ViewModel;

class ProjectSumViewModel extends ViewModel
{

    public function __construct()
    {
        parent::__construct();
        $this->setViewData();
    }

    public function setViewData()
    {
        $projectService = Factory::getInstance()->getProjectService();
        $projects = $projectService->getProjectsSumData();

        $this->setVariables(
            [
                'projects' => $projects,
                'perHourPerPerson' => Cost::getCostPerHourPerPerson()
            ]
            , true);
    }


}