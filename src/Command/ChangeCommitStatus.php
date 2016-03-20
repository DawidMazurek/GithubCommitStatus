<?php

namespace DawidMazurek\GithubCommitStatus\Command;

use DawidMazurek\GithubCommitStatus\Entity\CommitStatusEntity;
use DawidMazurek\GithubCommitStatus\Repository\CommitStatusRepository;

class ChangeCommitStatus
{
    /**
     * @var CommitStatusRepository
     */
    protected $repository;

    /**
     * @var CommitStatusEntity
     */
    protected $entity;

    /**
     * ChangeCommitStatus constructor.
     * @param CommitStatusRepository $repository
     * @param CommitStatusEntity $entity
     */
    public function __construct(CommitStatusRepository $repository, CommitStatusEntity $entity)
    {
        $this->repository = $repository;
        $this->entity = $entity;
    }

    public function execute()
    {
        $this->repository->changeCommitStatus($this->entity);
    }
}
