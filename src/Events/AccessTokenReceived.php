<?php

namespace Tecnogo\LaravelMeliSdk\Events;

use Tecnogo\MeliSdk\Config\AccessToken;

class AccessTokenReceived
{
    /**
     * @var AccessToken
     */
    private $accessToken;

    public function __construct(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return AccessToken
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
}