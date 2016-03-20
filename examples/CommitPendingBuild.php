<?php

require_once __DIR__ . '/../vendor/autoload.php';

use DawidMazurek\GithubCommitStatus\Command\ChangeCommitStatus;
use DawidMazurek\GithubCommitStatus\CommitStatusState\CommitStateType;
use DawidMazurek\GithubCommitStatus\CommitStatusState\CommitStatusState;
use DawidMazurek\GithubCommitStatus\Entity\CommitStatusEntity;
use DawidMazurek\GithubCommitStatus\Entity\CommitStatusIdentity;
use DawidMazurek\GithubCommitStatus\Gateway\CommitStatusHttpApiGateway;
use DawidMazurek\GithubCommitStatus\Repository\CommitStatusRepository;
use DawidMazurek\GithubCommitStatus\ValueObject\Sha\Sha;
use GuzzleHttp\Client;

$accessToken = 'c6fd7c18e93f4156ee15e617d230cca44d3ba639';
$owner = 'DawidMazurek';
$repo = 'citest';
$sha = new Sha('2e46a10dd6a8d7f38178d29bac6496d40df61e23');

$identity = new CommitStatusIdentity($owner, $repo, $sha);

$state = new CommitStatusState(CommitStateType::STATE_PENDING);

$entity = new CommitStatusEntity($identity, $state);

$httpClient = new Client();
$gateway = new CommitStatusHttpApiGateway($httpClient, $accessToken);

$statusRepository = new CommitStatusRepository($gateway);

$changeCommitStatus = new ChangeCommitStatus($statusRepository, $entity);
$changeCommitStatus->execute();
