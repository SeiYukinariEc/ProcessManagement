<?php


namespace Application\Controller;


use Application\ViewModel\MemberDetailViewModel;
use Application\ViewModel\MemberMonthDetailViewModel;
use Application\ViewModel\MemberMonthViewModel;
use Application\ViewModel\MemberViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class MemberMonthController extends AbstractActionController
{
    public function indexAction()
    {
        $viewModel = new MemberMonthViewModel();
        return $viewModel;
    }

    public function detailAction()
    {

        $userId = $this->params()->fromQuery('id');
        if (!$userId) {
            return $this->redirect()->toUrl('application');
        }


        $viewModel = new MemberMonthDetailViewModel($userId);
        return $viewModel;
    }

}