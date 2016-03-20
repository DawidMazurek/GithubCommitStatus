<?php

namespace DawidMazurek\GithubCommitStatus\ValueObject\Ref;

use InvalidArgumentException;

class Url
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @param string $url
     * @throws InvalidArgumentException
     */
    public function __construct($url)
    {
        if (!$this->validate($url)) {
            throw new InvalidArgumentException();
        }
        $this->url = $url;
    }

    /**
     * @param string $url
     * @return int
     */
    protected function validate($url)
    {
        return filter_var(FILTER_VALIDATE_URL, $url);
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
