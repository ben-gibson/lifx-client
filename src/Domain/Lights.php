<?php

namespace Gibbo\Lifx\Domain;

use ArrayIterator;

/**
 * A collection of Lifx lights
 */
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
                    return $light->connected();
                }
            )
        );
    }


    public function current()
    {
        return $this->getIterator()->current();
    }


    public function getIterator() : ArrayIterator
    {
        return new ArrayIterator($this->lights);
    }
}
