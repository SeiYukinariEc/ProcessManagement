<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Domain\Factory\Factory;
use Zend\Mvc\Controller\AbstractActionController;

class TallyController extends AbstractActionController
{
    public function indexAction()
    {
        $tallyService = Factory::getInstance()->getTallyService();
        $tallyService->exec();
        return $this->redirect()->toRoute('application');
    }
}
