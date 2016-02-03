<?php


namespace Application\Controller;


use Application\ViewModel\MemberDetailViewModel;
use Application\ViewModel\MemberViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class MemberController extends AbstractActionController
{
    public function indexAction()
    {
        $viewModel = new MemberViewModel();
        return $viewModel;
    }

    public function detailAction()
    {

        $userId = $this->params()->fromQuery('id');
        if (!$userId) {
            return $this->redirect()->toUrl('application');
        }


        $viewModel = new MemberDetailViewModel($userId);
        return $viewModel;
    }

}