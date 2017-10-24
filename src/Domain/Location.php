<?php

namespace Gibbo\Lifx\Domain;

use Gibbo\Lifx\Domain\Value\Id;

class Location
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


    public function equals(Location $location) : bool
    {
        return ($this->toString() === $location->toString() && get_class($this) === get_class($location));
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