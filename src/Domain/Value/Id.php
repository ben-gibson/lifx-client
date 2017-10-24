<?php

namespace Gibbo\Lifx\Domain\Value;

class Id
{
    private $value;


    public function __construct(string $value)
    {
        $this->value = $value;
    }


    public function equals(Id $id) : bool
    {
        return ($this->toString() === $id->toString() && get_class($this) && get_class($id));
    }


    public function toString() : string
    {
        return $this->__toString();
    }


    public function __toString() : string
    {
        return $this->value;
    }
}