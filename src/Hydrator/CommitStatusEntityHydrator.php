<?php

namespace DawidMazurek\GithubCommitStatus\Hydrator;

use DawidMazurek\GithubCommitStatus\CommitStatusState\CommitStatusState;
use DawidMazurek\GithubCommitStatus\Entity\CommitIdentityParameters;
use Dawidmazurek\GithubCommitStatus\Entity\CommitStatusEntity;
use DawidMazurek\GithubCommitStatus\Entity\CommitStatusIdentity;
use DawidMazurek\GithubCommitStatus\Entity\CommitStatusParameters;
use DawidMazurek\GithubCommitStatus\ValueObject\Sha\Sha;

class CommitStatusEntityHydrator implements HydratorInterface
{

    public function hydrate(array $data)
    {
        $identity = new CommitStatusIdentity(
            $data[CommitIdentityParameters::PARAM_OWNER],
            $data[CommitIdentityParameters::PARAM_REPO],
            new Sha($data[CommitIdentityParameters::PARAM_SHA])
        );

        $state = new CommitStatusState(CommitStatusParameters::PARAM_STATE);
        $entity = new CommitStatusEntity($identity, $state);
        return $entity;
    }

    public function extract(CommitStatusEntity $entity)
    {
        $identity = $entity->getIdentity();

        return [
            CommitStatusParameters::PARAM_STATE => $entity->getState()->getState(),
            CommitStatusParameters::PARAM_TARGET_URL => $entity->getTargetUrl(),
            CommitStatusParameters::PARAM_DESCRIPTION => $entity->getDescription(),
            CommitStatusParameters::PARAM_CONTEXT => $entity->getContext(),
            CommitIdentityParameters::PARAM_OWNER => $identity->getOwner(),
            CommitIdentityParameters::PARAM_REPO => $identity->getRepo(),
            CommitIdentityParameters::PARAM_SHA => $identity->getSha()->getSha()
        ];
    }
}