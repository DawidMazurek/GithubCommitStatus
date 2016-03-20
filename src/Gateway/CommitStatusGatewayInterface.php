<?php

namespace DawidMazurek\GithubCommitStatus\Gateway;

interface CommitStatusGatewayInterface
{
    public function saveCommitStatus(array $data);
}