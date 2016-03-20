<?php

namespace DawidMazurek\GithubCommitStatus\Repository;

use DawidMazurek\GithubCommitStatus\Entity\CommitStatusEntity;
use DawidMazurek\GithubCommitStatus\Gateway\CommitStatusGatewayInterface;
use DawidMazurek\GithubCommitStatus\Hydrator\CommitStatusEntityHydrator;

/**
 * Created by PhpStorm.
 * User: Dawid
 * Date: 2016-03-20
 * Time: 10:02
 */
class CommitStatusRepository
{
    /**
     * @var CommitStatusGatewayInterface
     */
    protected $gateway;

    /**
     * CommitStatusRepository constructor.
     * @param CommitStatusGatewayInterface $gateway
     */
    public function __construct(CommitStatusGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * @param CommitStatusEntity $entity
     */
    public function changeCommitStatus(CommitStatusEntity $entity)
    {
        $hydrator = new CommitStatusEntityHydrator();
        $data = $hydrator->extract($entity);
        $this->gateway->saveCommitStatus($data);
    }
}
