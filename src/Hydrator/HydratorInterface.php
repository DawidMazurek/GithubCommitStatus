<?php

namespace DawidMazurek\GithubCommitStatus\Hydrator;

use Dawidmazurek\GithubCommitStatus\Entity\CommitStatusEntity;

interface HydratorInterface
{
    public function hydrate(array $data);
    public function extract(CommitStatusEntity $entity);
}
