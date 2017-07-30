<?php

namespace Gibbo\Lifx\Entities;

use Gibbo\Lifx\Entities\Value\Colour;
use Gibbo\Lifx\Entities\Value\Id;

/**
 * Represents a Lifx light.
 */
class Light
{
    /**
     * @var Id
     */
    private $id;

    /**
     * @var string
     */
    private $label;

    /**
     * @var State
     */
    private $state;

    /**
     * @var Group
     */
    private $group;

    /**
     * @var Location
     */
    private $location;

    /**
     * @var \DateTimeImmutable
     */
    private $lastSeen;

    /**
     * Constructor.
     *
     * @param Id $id
     * @param string $label
     * @param Group $group
     * @param Location $location
     * @param \DateTimeImmutable $lastSeen
     * @param State $state
     */
    public function __construct(
        Id $id,
        string $label,
        Group $group,
        Location $location,
        \DateTimeImmutable $lastSeen,
        State $state
    )
    {
        $this->id = $id;
        $this->label = $label;
        $this->state = $state;
        $this->group = $group;
        $this->location = $location;
        $this->lastSeen = $lastSeen;
    }

    /**
     * Get the id
     *
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * Get the state of the light.
     *
     * @return State
     */
    public function getState(): State
    {
        return $this->state;
    }

    /**
     * Toggle the power.
     *
     * @return void
     */
    public function togglePower(): void
    {
        $this->state->togglePower();
    }

    /**
     * Turn on.
     *
     * @return void
     */
    public function turnOn(): void
    {
        $this->state->turnOn();
    }

    /**
     * Turn off.
     *
     * @return void
     */
    public function turnOff(): void
    {
        $this->state->turnOff();
    }

    /**
     * Is the light on?
     *
     * @return bool
     */
    public function isOn(): bool
    {
        return $this->state->isOn();
    }

    /**
     * Is the light off?
     *
     * @return bool
     */
    public function isOff(): bool
    {
        return $this->state->isOff();
    }

    /**
     * Increase the brightness.
     *
     * @return void
     */
    public function increaseBrightness(): void
    {
        $this->state->increaseBrightness();
    }

    /**
     * Decrease the brightness.
     *
     * @return void
     */
    public function decreaseBrightness(): void
    {
        $this->state->decreaseBrightness();
    }

    /**
     * Go to maximum brightness.
     *
     * @return void
     */
    public function maximumBrightness(): void
    {
        $this->state->maximumBrightness();
    }

    /**
     * Go to minimum brightness.
     *
     * @return void
     */
    public function minimumBrightness(): void
    {
        $this->state->minimumBrightness();
    }

    /**
     * Get the brightness.
     *
     * @return float
     */
    public function getBrightness(): float
    {
        return $this->state->getBrightness();
    }

    /**
     * Get the colour.
     *
     * @return Colour
     */
    public function getColour(): Colour
    {
        return $this->state->getColour();
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
        $this->state->applyColour($colour);
    }

    /**
     * When was the light last seen.
     *
     * @return \DateTimeImmutable
     */
    public function lastSeen(): \DateTimeImmutable
    {
        return $this->lastSeen;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Get the group.
     *
     * @return Group
     */
    public function getGroup(): Group
    {
        return $this->group;
    }

    /**
     * Get the location.
     *
     * @return Location
     */
    public function getLocation(): Location
    {
        return $this->location;
    }

    /**
     * @inheritdoc
     */
    public function __toString(): string
    {
        return $this->getLabel();
    }
}