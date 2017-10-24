<?php

namespace Gibbo\Lifx\Domain;

use Gibbo\Lifx\Domain\Value\Brightness;
use Gibbo\Lifx\Domain\Value\Colour;
use Gibbo\Lifx\Domain\Value\Id;

class Light
{
    private $id;

    private $label;

    private $state;

    private $group;

    private $location;

    private $lastSeen;

    private $connected;

    public function __construct(
        Id $id,
        string $label,
        Group $group,
        Location $location,
        \DateTimeImmutable $lastSeen,
        bool $connected,
        State $state
    ) {
        $this->id        = $id;
        $this->label     = $label;
        $this->state     = $state;
        $this->group     = $group;
        $this->location  = $location;
        $this->lastSeen  = $lastSeen;
        $this->connected = $connected;
    }


    public function id() : Id
    {
        return $this->id;
    }


    /**
     * Tells us if the light is connected to the internet - not the same as power on/off.
     */
    public function isConnected() : bool
    {
        return $this->connected;
    }


    public function togglePower() : void
    {
        $this->state->togglePower();
    }


    public function on() : void
    {
        $this->state->on();
    }


    public function off() : void
    {
        $this->state->off();
    }


    public function isOn() : bool
    {
        return $this->state->isOn();
    }


    public function isOff() : bool
    {
        return $this->state->isOff();
    }


    public function increaseBrightness() : void
    {
        $this->state->increaseBrightness();
    }


    public function decreaseBrightness() : void
    {
        $this->state->decreaseBrightness();
    }


    public function maximumBrightness() : void
    {
        $this->state->maximumBrightness();
    }


    public function minimumBrightness() : void
    {
        $this->state->minimumBrightness();
    }


    public function brightness() : Brightness
    {
        return $this->state->brightness();
    }


    public function colour() : Colour
    {
        return $this->state->colour();
    }


    public function pickColour(Colour $colour) : void
    {
        $this->state->pickColour($colour);
    }


    public function lastSeen() : \DateTimeImmutable
    {
        return $this->lastSeen;
    }


    public function label() : string
    {
        return $this->label;
    }


    public function group() : Group
    {
        return $this->group;
    }


    public function location() : Location
    {
        return $this->location;
    }


    public function toString() : string
    {
        return $this->__toString();
    }


    public function __toString() : string
    {
        return $this->label();
    }


    public function state() : State
    {
        return clone $this->state;
    }
}