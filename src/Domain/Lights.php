<?php

namespace Gibbo\Lifx\Domain;

use ArrayIterator;

class Lights implements \IteratorAggregate
{
    private $position = 0;
    private $lights;


    public function __construct(Light ...$lights)
    {
        $this->position = 0;
        $this->lights   = $lights;
    }


    public function connected() : self
    {
        return new static (
            ...array_filter(
                $this->lights,
                function (Light $light) {
                    return $light->isConnected();
                }
            )
        );
    }


    public function current() : ?Light
    {
        return $this->getIterator()->current();
    }


    public function getIterator() : ArrayIterator
    {
        return new ArrayIterator($this->lights);
    }
}
