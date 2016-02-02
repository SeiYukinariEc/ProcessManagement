<?php


namespace Application\Controller;


use Application\ViewModel\MemberViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MemberController extends AbstractActionController
{
    public function indexAction()
    {
        $viewModel = new MemberViewModel();
        return $viewModel;
    }
}