<?php


namespace Application\Controller;

use Application\ViewModel\MemberViewModel;
use Application\ViewModel\ProjectViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class ProjectController extends AbstractActionController
{
    public function indexAction()
    {
        $viewModel = new ProjectViewModel();
        return $viewModel;
    }
}