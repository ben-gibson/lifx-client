<?php

namespace Gibbo\Lifx;

/**
 * Api Configuration.
 */
class Configuration
{
    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $version;

    /**
     * @var string
     */
    private $token;

    /**
     * Constructor.
     *
     * @param $host
     * @param $version
     * @param $token
     */
    public function __construct(string $host, string $version, string $token)
    {
        $this->host    = ltrim($host, '/');
        $this->version = $version;
        $this->token   = $token;
    }

    /**
     * Get the url for a given endpoint.
     *
     * @param string $endpoint
     *
     * @return string
     */
    public function getUrlForEndPoint(string $endpoint): string
    {
        return sprintf('%s/%s/%s', $this->host, $this->version, $endpoint);
    }

    /**
     * Get the authorisation header using the token.
     *
     * @return string
     */
    public function getAuthorisationBearer(): string
    {
        return sprintf('Bearer %s', $this->token);
    }
}