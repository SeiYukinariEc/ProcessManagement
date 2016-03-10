<?php


namespace Application\Controller;

use Application\ViewModel\ProjectSumViewModel;
use Application\ViewModel\ProjectViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class ProjectController extends AbstractActionController
{
    public function indexAction()
    {
        $viewModel = new ProjectViewModel();
        return $viewModel;
    }

    public function sumAction()
    {
        $viewModel = new ProjectSumViewModel();
        return $viewModel;
    }
}