<?php

namespace Gibbo\Lifx\Entities\Value;

use Assert\Assert;

/**
 * Brightness.
 */
class Brightness
{
    /**
     * @var float
     */
    private $value;

    /**
     * Constructor.
     *
     * @param float $value
     */
    public function __construct(float $value)
    {
        Assert::that($value)->float()->between(0, 1);

        $this->value = round($value, 1);
    }

    /**
     * Maximum brightness.
     *
     * @return static
     */
    public static function maximum()
    {
        return new static(1);
    }

    /**
     * Minimum brightness.
     *
     * @return static
     */
    public static function minimum()
    {
        return new static(0);
    }

    /**
     * Are we at maximum brightness?
     *
     * @return bool
     */
    public function atMax(): bool
    {
        return $this->value === 1;
    }

    /**
     * Are we at the minimum brightness?
     *
     * @return bool
     */
    public function atMin(): bool
    {
        return $this->value === 0;
    }

    /**
     * Increase the brightness.
     *
     * @return static
     */
    public function increase()
    {
        return new static($this->value + 0.1);
    }

    /**
     * Decrease the brightness.
     *
     * @return static
     */
    public function decrease()
    {
        return new static($this->value - 0.1);
    }

    /**
     * Go to maximum brightness.
     *
     * @return static
     */
    public function toMaximum()
    {
        return static::maximum();
    }

    /**
     * Go to minimum brightness.
     *
     * @return static
     */
    public function toMinimum()
    {
        return static::minimum();
    }

    /**
     * Get the value.
     *
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }
}