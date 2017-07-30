<?php

namespace Gibbo\Lifx\Entities;

use Gibbo\Lifx\Entities\Value\Brightness;
use Gibbo\Lifx\Entities\Value\Colour;
use Gibbo\Lifx\Entities\Value\Power;

/**
 * Represents a stat a light can be in.
 */
class State implements \JsonSerializable
{
    /**
     * @var Brightness
     */
    private $brightness;

    /**
     * @var Power
     */
    private $power;


    /**
     * @var Colour
     */
    private $colour;

    /**
     * Constructor.
     *
     * @param Power $power
     * @param Brightness $brightness
     * @param Colour $colour
     */
    public function __construct(Power $power, Brightness $brightness, Colour $colour)
    {
        $this->brightness = $brightness;
        $this->power = $power;
        $this->colour = $colour;
    }

    /**
     * Apply a colour.
     *
     * @param Colour $colour
     *
     * @return void
     */
    public function applyColour(Colour $colour): void
    {
        $this->colour = $colour;
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

    /**
     * Get the colour.
     *
     * @return Colour
     */
    public function getColour(): Colour
    {
        return $this->colour;
    }

    /**
     * @inheritdoc
     */
    public function jsonSerialize()
    {
        return [
            'power' => $this->isOn() ? 'on' : 'off',
            'brightness' => $this->getBrightness(),
            'color' => $this->colour->__toString()
        ];
    }
}