<?php

namespace Application\ViewModel;

use Application\Domain\Factory\Factory;
use Zend\View\Model\ViewModel;

class MemberMonthViewModel extends ViewModel
{

    public function __construct()
    {
        parent::__construct();
        $this->setViewData();
    }

    public function setViewData()
    {

        $userService = Factory::getInstance()->getUserService();
        $members = $userService->getMembersMonthData();

        $this->setVariables(
            [
                'members' => $members,
            ]
            , true);
    }


}