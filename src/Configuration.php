<?php

namespace Gibbo\Lifx;

class Configuration
{
    private $host;

    private $version;

    private $token;


    public function __construct(string $host, string $version, string $token)
    {
        $this->host    = ltrim($host, '/');
        $this->version = $version;
        $this->token   = $token;
    }


    public function urlForEndPoint(string $endpoint) : string
    {
        return sprintf('%s/%s/%s', $this->host, $this->version, $endpoint);
    }


    public function authorisationBearer() : string
    {
        return sprintf('Bearer %s', $this->token);
    }
}