<?php

namespace Gibbo\Lifx;

use Gibbo\Lifx\Entities\Selector;
use Gibbo\Lifx\Entities\Light;
use Gibbo\Lifx\Entities\State;
use Gibbo\Lifx\Factory\LightFactory;
use GuzzleHttp\Client as HttpClient;

/**
 * Lifx.
 */
class Lifx
{
    /**
     * @var HttpClient
     */
    private $client;

    /**
     * @var Configuration
     */
    private $configuration;

    /**
     * @var LightFactory
     */
    private $lightFactory;

    /**
     * Constructor.
     *
     * @param HttpClient $client
     * @param Configuration $configuration
     * @param LightFactory $lightFactory
     */
    public function __construct(HttpClient $client, Configuration $configuration, LightFactory $lightFactory)
    {
        $this->client        = $client;
        $this->configuration = $configuration;
        $this->lightFactory  = $lightFactory;
    }

    /**
     * Get all the lights.
     *
     * @return Light[]
     */
    public function getAllLights()
    {
        $response = $this->client->get(
            $this->configuration->getUrlForEndPoint('lights/all'),
            ['headers' => ['Authorization' => $this->configuration->getAuthorisationBearer()]]
        );
        
        return array_map(
            function (\stdClass $light) {
                return $this->lightFactory->create($light);
            },
            \GuzzleHttp\json_decode($response->getBody()->getContents())
        );
    }

    /**
     * Update a light.
     *
     * @param Light $light
     *
     * @return void
     */
    public function updateLight(Light $light): void
    {
        $this->setState(Selector::light($light), $light->getState());
    }

    /**
     * Update the state of all lights.
     *
     * @param State $state
     *
     * @return void
     */
    public function updateAll(State $state): void
    {
        $this->setState(Selector::all(), $state);
    }

    /**
     * Match all lights to the same state as the given light.
     *
     * @param Light $light
     *
     * @return void
     */
    public function matchAllToLight(Light $light): void
    {
        $this->setState(Selector::all(), $light->getState());
    }

    /**
     * Set the state.
     *
     * @param Selector $selector
     * @param State $state
     *
     * @return void
     */
    private function setState(Selector $selector, State $state): void
    {
        $response = $this->client->put(
            $this->configuration->getUrlForEndPoint(sprintf('lights/%s/state', $selector)),
            [
                'headers' => [
                    'Authorization' => $this->configuration->getAuthorisationBearer(),
                    'Content-Type' => 'application/json'
                ],
                'body' => \GuzzleHttp\json_encode($state),
            ]
        );
    }
}
