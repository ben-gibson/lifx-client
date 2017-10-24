<?php

namespace Gibbo\Lifx;

use Gibbo\Lifx\Domain\Lights;
use Gibbo\Lifx\Domain\Selector;
use Gibbo\Lifx\Domain\Light;
use Gibbo\Lifx\Domain\State;
use Gibbo\Lifx\Exception\InvalidResponseException;
use Gibbo\Lifx\Exception\LightNotConnectedException;
use Gibbo\Lifx\Factory\LightFactory;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;

class Lifx
{
    private $client;

    private $configuration;

    private $lightFactory;


    public function __construct(HttpClient $client, Configuration $configuration, LightFactory $lightFactory)
    {
        $this->client        = $client;
        $this->configuration = $configuration;
        $this->lightFactory  = $lightFactory;
    }


    public function lights() : Lights
    {
        $response = $this->client->get(
            $this->configuration->urlForEndPoint('lights/all'),
            ['headers' => ['Authorization' => $this->configuration->authorisationBearer()]]
        );

        return new Lights(
            ...array_map(
                function (\stdClass $light) {
                    return $this->lightFactory->create($light);
                },
                \GuzzleHttp\json_decode($response->getBody()->getContents())
            )
        );
    }


    public function update(Light $light) : void
    {
        if (!$light->isConnected()) {
            throw new LightNotConnectedException($light);
        }

        $this->affect(Selector::light($light), $light->state());
    }


    public function matchState(Selector $selector, State $state) : void
    {
        $this->affect($selector, $state);
    }


    private function affect(Selector $selector, State $state) : void
    {
        try {
            $this->client->put(
                $this->configuration->urlForEndPoint(sprintf('lights/%s/state', $selector)),
                [
                    'headers' => [
                        'Authorization' => $this->configuration->authorisationBearer(),
                        'Content-Type'  => 'application/json',
                    ],
                    'body'    => \GuzzleHttp\json_encode($state),
                ]
            );
        } catch (RequestException $exception) {
            throw new InvalidResponseException($exception->getMessage());
        }
    }
}
