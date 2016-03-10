<?php


namespace Application\Domain\Service;


use Application\Domain\Factory\Factory;
use Application\Domain\infrastructure\Cache;

class TallyService
{
    public function exec()
    {
        $this->removeCache();
        $this->setCache();
    }

    private function setCache()
    {
        $projectService = Factory::getInstance()->getProjectService();
        $projectService->getProjectsData();
        $projectService->getProjectsSumData();

        $userService = Factory::getInstance()->getUserService();
        $userService->getMembersData();
        $userService->getMembersMonthData();

//        $memberIds = Factory::getInstance()->getUserRepository()->getUserIds();
//        foreach ($memberIds as $id) {
//            $userService->getMemberDetailData($id);
//            $userService->getMemberMonthDetailData($id);
//        }
    }

    private function removeCache()
    {
        $cache = Cache::getAdapter();

        $cache->removeItem(ProjectService::CACHE_KEY_WEEK);
        $cache->removeItem(ProjectService::CACHE_KEY_SUM);
        $cache->removeItem(UserService::CACHE_KEY_WEEK);
        $cache->removeItem(UserService::CACHE_KEY_MONTH);

//        $memberIds = Factory::getInstance()->getUserRepository()->getUserIds();
//        foreach ($memberIds as $id) {
//            $cache->removeItem(UserService::CACHE_KEY_WEEK_USER . '-' . $id);
//            $cache->removeItem(UserService::CACHE_KEY_MONTH_USER . '-' . $id);
//        }
    }
}