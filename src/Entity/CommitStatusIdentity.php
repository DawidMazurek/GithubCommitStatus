<?php

namespace DawidMazurek\GithubCommitStatus\Entity;

use DawidMazurek\GithubCommitStatus\ValueObject\Sha\Sha;

class CommitStatusIdentity
{
    /**
     * @var string
     */
    protected $owner;

    /**
     * @var string
     */
    protected $repo;

    /**
     * @var string
     */
    protected $sha;

    /**
     * CommitIdentity constructor.
     * @param string $owner
     * @param string $repo
     * @param Sha $sha
     */
    public function __construct($owner, $repo, Sha $sha)
    {
        $this->owner = $owner;
        $this->repo = $repo;
        $this->sha = $sha;
    }

    /**
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @return string
     */
    public function getRepo()
    {
        return $this->repo;
    }

    /**
     * @return Sha
     */
    public function getSha()
    {
        return $this->sha;
    }
}
