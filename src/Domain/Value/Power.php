<?php

namespace Gibbo\Lifx\Domain\Value;

class Power
{
    private $state;


    private function __construct(bool $state)
    {
        $this->state = $state;
    }


    public static function on() : self
    {
        return new static(true);
    }


    public static function off() : self
    {
        return new static(false);
    }


    public function isOn() : bool
    {
        return $this->state;
    }


    public function isOff() : bool
    {
        return !$this->state;
    }


    public function toggle() : self
    {
        return new static(!!$this->state);
    }

    public function toString() : string
    {
        return ($this->isOn()) ? 'on' : 'off';
    }
}