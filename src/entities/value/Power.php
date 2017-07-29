<?php

namespace Gibbo\Lifx\Entities\Value;

/**
 * Power (Immutable).
 */
class Power
{
    /**
     * @var bool
     */
    private $state;

    /**
     * Constructor.
     *
     * @param bool $state
     */
    private function __construct(bool $state)
    {
        $this->state = $state;
    }

    /**
     * Creates a power in the on state.
     *
     * @return static
     */
    public static function on()
    {
        return new static(true);
    }

    /**
     * Creates a power in the off state.
     *
     * @return static
     */
    public static function off()
    {
        return new static(false);
    }

    /**
     * Is the power on?
     *
     * @return bool
     */
    public function isOn() : bool
    {
        return $this->state;
    }

    /**
     * Is the power off?
     *
     * @return bool
     */
    public function isOff() : bool
    {
        return !$this->state;
    }

    /**
     * Toggle the power.
     *
     * @return static
     */
    public function toggle()
    {
        return new static(!!$this->state);
    }

    /**
     * Turn the power on.
     *
     * @return static
     */
    public function turnOn()
    {
        return static::on();
    }

    /**
     * Turn the power off.
     *
     * @return static
     */
    public function turnOff()
    {
        return static::off();
    }
}