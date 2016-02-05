<?php

namespace Application\ViewModel;

use Application\Domain\Factory\Factory;
use Zend\View\Model\ViewModel;

class MemberMonthDetailViewModel extends ViewModel
{

    private $userId;

    public function __construct($userId)
    {
        parent::__construct();
        $this->userId = $userId;
        $this->setViewData();
    }

    public function setViewData()
    {

        $userService = Factory::getInstance()->getUserService();
        $issues = $userService->getMemberMonthDetailData($this->userId);
        $user = Factory::getInstance()->getUserRepository()->getUserByPk($this->userId);


        $this->setVariables(
            [
                'issues' => $issues,
                'userName' => $user['name']
            ]
            , true);
    }


}