<?php


namespace Application\Domain\Repository;


use Ginq\Ginq;

final class ProjectRepository extends AbstractRepository
{
    public function getAll()
    {
        return $this->backlog->projects->get(
            [
                'archived' => false,
                'all' => true
            ]
        );
    }

    public function getProjectIds()
    {
        return Ginq::from($this->getAll())
            ->select(function ($project) {
                return $project['id'];
            }
            )
            ->toArray();
    }
}