<?php

namespace DawidMazurek\GithubCommitStatus\Entity;

use DawidMazurek\GithubCommitStatus\CommitStatusState\CommitStatusState;
use DawidMazurek\GithubCommitStatus\ValueObject\Ref\Url;

class CommitStatusEntity
{
    /**
     * @var CommitStatusIdentity
     */
    protected $identity;

    /**
     * @var CommitStatusState
     */
    protected $state;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $context = 'default';

    /**
     * @var Url
     */
    protected $targetUrl;

    /**
     * CommitStatusEntity constructor.
     * @param CommitStatusIdentity $identity
     * @param CommitStatusState $state
     */
    public function __construct(CommitStatusIdentity $identity, CommitStatusState $state)
    {
        $this->identity = $identity;
        $this->state = $state;
    }

    /**
     * @param Url $targetUrl
     */
    public function setTargetUrl(Url $targetUrl)
    {
        $this->targetUrl = $targetUrl;
    }

    /**
     * @return Url
     */
    public function getTargetUrl()
    {
        return $this->targetUrl;
    }

    /**
     * @param string $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return CommitStatusState
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return CommitStatusIdentity
     */
    public function getIdentity()
    {
        return $this->identity;
    }
}
