<?php

namespace Gibbo\Lifx\Domain;

use Gibbo\Lifx\Domain\Value\Brightness;
use Gibbo\Lifx\Domain\Value\Colour;
use Gibbo\Lifx\Domain\Value\Power;

/**
 * Represents the stat a light can be (on or off, red or blue, bright or dark etc).
 */
class State implements \JsonSerializable
{
    private $brightness;

    private $power;

    private $colour;


    public function __construct(Power $power, Brightness $brightness, Colour $colour)
    {
        $this->brightness = $brightness;
        $this->power      = $power;
        $this->colour     = $colour;
    }


    public function pickColour(Colour $colour) : void
    {
        $this->colour = $colour;
    }


    public function togglePower() : void
    {
        $this->power = $this->power->toggle();
    }


    public function turnOn() : void
    {
        $this->power = $this->power->turnOn();
    }


    public function turnOff() : void
    {
        $this->power = $this->power->turnOff();
    }


    public function isOn() : bool
    {
        return $this->power->isOn();
    }


    public function isOff() : bool
    {
        return $this->power->isOff();
    }


    public function increaseBrightness() : void
    {
        $this->brightness = $this->brightness->increase();
    }


    public function decreaseBrightness() : void
    {
        $this->brightness = $this->brightness->decrease();
    }


    public function maximumBrightness() : void
    {
        $this->brightness = $this->brightness->toMaximum();
    }


    public function minimumBrightness() : void
    {
        $this->brightness = $this->brightness->toMinimum();
    }


    public function brightness() : float
    {
        return $this->brightness->value();
    }


    public function colour() : Colour
    {
        return $this->colour;
    }


    public function jsonSerialize()
    {
        return [
            'power'      => $this->power->toString(),
            'brightness' => $this->brightness(),
            'color'      => $this->colour->toString(),
        ];
    }
}