<?php

namespace Gibbo\Lifx\Exception;

use Gibbo\Lifx\Domain\Light;

class LightNotConnectedException extends \RuntimeException implements LifxException
{
    public function __construct(Light $light)
    {
        parent::__construct(sprintf("Light '%s' cannot be updated as it's not connected!", $light->toString()));
    }
}