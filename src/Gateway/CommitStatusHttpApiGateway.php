<?php

namespace DawidMazurek\GithubCommitStatus\Gateway;

use DawidMazurek\GithubCommitStatus\Entity\CommitIdentityParameters;
use DawidMazurek\GithubCommitStatus\Entity\CommitStatusParameters;
use GuzzleHttp\ClientInterface;

class CommitStatusHttpApiGateway implements CommitStatusGatewayInterface
{

    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @var string
     */
    protected $token;

    /**
     * CommitStatusHttpApiGateway constructor.
     * @param ClientInterface $httpClient
     * @param string $access_token
     */
    public function __construct(ClientInterface $httpClient, $access_token)
    {
       // $httpClient->setDefaultOption('verify', false);
        $this->httpClient = $httpClient;
        $this->token = $access_token;
    }

    /**
     * @param array $data
     */
    public function saveCommitStatus(array $data)
    {
        $url = "https://api.github.com/repos/{$data[CommitIdentityParameters::PARAM_OWNER]}".
            "/{$data[CommitIdentityParameters::PARAM_REPO]}/statuses/".
            "{$data[CommitIdentityParameters::PARAM_SHA]}?access_token={$this->token}";
        echo $url;
         $this->httpClient->request(
            'POST',
            $url,
             [
                 'verify' => false,
                'json' => [
                    CommitStatusParameters::PARAM_STATE => $data[CommitStatusParameters::PARAM_STATE],
                    CommitStatusParameters::PARAM_TARGET_URL => $data[CommitStatusParameters::PARAM_TARGET_URL],
                    CommitStatusParameters::PARAM_DESCRIPTION => $data[CommitStatusParameters::PARAM_DESCRIPTION],
                    CommitStatusParameters::PARAM_CONTEXT => $data[CommitStatusParameters::PARAM_CONTEXT],
                ]
             ]
         );
    }
}
