<?php

namespace Gibbo\Lifx\Domain;

use Gibbo\Lifx\Domain\Value\Id;

/**
 * Represents the grouping of lights.
 */
class Group
{
    private $id;

    private $name;


    public function __construct(Id $id, string $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }


    public function id() : Id
    {
        return $this->id;
    }


    public function name() : string
    {
        return $this->name;
    }


    public function toString() : string
    {
        return $this->__toString();
    }


    public function __toString() : string
    {
        return $this->name();
    }
}