<?php

require_once __DIR__ . '/../vendor/autoload.php';

use DawidMazurek\GithubCommitStatus\Facade\ChangeCommitStatusFacade;
use DawidMazurek\GithubCommitStatus\CommitStatusState\CommitStateType;

$owner = 'DawidMazurek';
$repo = 'citest';
$sha = '2e46a10dd6a8d7f38178d29bac6496d40df61e23';
$accessToken = 'c6fd7c18e93f4156ee15e617d230cca44d3ba639';


$facade = new ChangeCommitStatusFacade(
    $owner,
    $repo,
    $sha,
    $accessToken
);

$facade->ChangeCommitStatus(CommitStateType::STATE_PENDING);