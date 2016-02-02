<?php


namespace Application\Domain\Repository;


use Ginq\Ginq;

final class UserRepository extends AbstractRepository
{
    public function getAll()
    {
        return $this->backlog->users->get();
    }

    public function getUserIds()
    {
        return Ginq::from($this->getAll())
            ->select(function ($user) {
                return $user['id'];
            }
            )
            ->toArray();
    }
}