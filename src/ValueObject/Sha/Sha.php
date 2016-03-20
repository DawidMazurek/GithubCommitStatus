<?php

namespace DawidMazurek\GithubCommitStatus\ValueObject\Sha;

use InvalidArgumentException;

class Sha
{
    /**
     * @var string
     */
    protected $sha;

    /**
     * @param string $sha
     * @throws InvalidArgumentException
     */
    public function __construct($sha)
    {
        if (!$this->validate($sha)) {
            throw new InvalidArgumentException();
        }
        $this->sha = $sha;
    }

    /**
     * @param $sha
     * @return int
     */
    protected function validate($sha)
    {
        return preg_match('/[[:alnum:]]{40}/', $sha);
    }

    /**
     * @return string
     */
    public function getSha()
    {
        return $this->sha;
    }
}
