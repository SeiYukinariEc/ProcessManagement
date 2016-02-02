<?php

namespace Application\ViewModel;

use Application\Domain\Factory\Factory;
use Zend\View\Model\ViewModel;

class ProjectViewModel extends ViewModel
{

    public function __construct()
    {
        parent::__construct();
        $this->setViewData();
    }

    public function setViewData()
    {
        $projectService = Factory::getInstance()->getProjectService();
        $projects = $projectService->getProjectsData();

        $this->setVariables(
            [
                'projects' => $projects,
            ]
            , true);
    }


}