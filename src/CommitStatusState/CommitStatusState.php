<?php

namespace DawidMazurek\GithubCommitStatus\CommitStatusState;

class CommitStatusState
{
    /**
     * @var string
     */
    protected $state;

    /**
     * CommitStatusState constructor.
     * @param string $state
     */
    public function __construct($state)
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }
}
