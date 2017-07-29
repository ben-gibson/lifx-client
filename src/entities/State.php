<?php

namespace Gibbo\Lifx\Entities;

use Gibbo\Lifx\Entities\Value\Brightness;
use Gibbo\Lifx\Entities\Value\Power;

/**
 * Represents a stat a light can be in.
 */
class State
{
    /**
     * Constructor.
     *
     * @param Power $power
     * @param Brightness $brightness
     */
    public function __construct(Power $power, Brightness $brightness)
    {
        $this->brightness = $brightness;
        $this->power      = $power;
    }

    /**
     * Toggle the power.
     *
     * @return void
     */
    public function togglePower(): void
    {
        $this->power = $this->power->toggle();
    }

    /**
     * Turn on.
     *
     * @return void
     */
    public function turnOn(): void
    {
        $this->power = $this->power->turnOn();
    }

    /**
     * Turn off.
     *
     * @return void
     */
    public function turnOff(): void
    {
        $this->power = $this->power->turnOff();
    }

    /**
     * Is the light on?
     *
     * @return bool
     */
    public function isOn(): bool
    {
        return $this->power->isOn();
    }

    /**
     * Is the light off?
     *
     * @return bool
     */
    public function isOff(): bool
    {
        return $this->power->isOff();
    }

    /**
     * Increase the brightness.
     *
     * @return void
     */
    public function increaseBrightness(): void
    {
        $this->brightness = $this->brightness->increase();
    }

    /**
     * Decrease the brightness.
     *
     * @return void
     */
    public function decreaseBrightness(): void
    {
        $this->brightness = $this->brightness->decrease();
    }

    /**
     * Go to maximum brightness.
     *
     * @return void
     */
    public function maximumBrightness(): void
    {
        $this->brightness = $this->brightness->toMaximum();
    }

    /**
     * Go to minimum brightness.
     *
     * @return void
     */
    public function minimumBrightness(): void
    {
        $this->brightness = $this->brightness->toMinimum();
    }

    /**
     * Get the brightness.
     *
     * @return float
     */
    public function getBrightness(): float
    {
        return $this->brightness->getValue();
    }
}