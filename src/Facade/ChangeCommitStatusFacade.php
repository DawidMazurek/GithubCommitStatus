<?php

namespace DawidMazurek\GithubCommitStatus\Facade;

use DawidMazurek\GithubCommitStatus\Command\ChangeCommitStatus;
use DawidMazurek\GithubCommitStatus\CommitStatusState\CommitStatusState;
use DawidMazurek\GithubCommitStatus\Entity\CommitStatusEntity;
use DawidMazurek\GithubCommitStatus\Entity\CommitStatusIdentity;
use DawidMazurek\GithubCommitStatus\Gateway\CommitStatusHttpApiGateway;
use DawidMazurek\GithubCommitStatus\Repository\CommitStatusRepository;
use DawidMazurek\GithubCommitStatus\ValueObject\Sha\Sha;
use GuzzleHttp\Client;

class ChangeCommitStatusFacade
{
    /**
     * @var CommitStatusIdentity
     */
    protected $identity;

    /**
     * @var string
     */
    protected $accessToken;

    /**
     * ChangeCommitStatusFacade constructor.
     * @param string $owner
     * @param string $repo
     * @param string $sha
     * @param string $accessToken
     */
    public function __construct($owner, $repo, $sha, $accessToken)
    {
        $this->identity = new CommitStatusIdentity($owner, $repo, new Sha($sha));
        $this->accessToken = $accessToken;
    }

    /**
     * @param $status
     */
    public function ChangeCommitStatus($status)
    {
        $state = new CommitStatusState($status);
        $entity = new CommitStatusEntity($this->identity, $state);

        $httpClient = new Client();
        $gateway = new CommitStatusHttpApiGateway($httpClient, $this->accessToken);

        $statusRepository = new CommitStatusRepository($gateway);
        $changeCommitStatus = new ChangeCommitStatus($statusRepository, $entity);
        $changeCommitStatus->execute();
    }
}
