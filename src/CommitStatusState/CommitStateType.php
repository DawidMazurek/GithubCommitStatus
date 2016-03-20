<?php

namespace DawidMazurek\GithubCommitStatus\CommitStatusState;

class CommitStateType
{
    const STATE_PENDING = 'pending';
    const STATE_SUCCESS = 'success';
    const STATE_ERROR = 'error';
    const STATE_FAILURE = 'failure';
}