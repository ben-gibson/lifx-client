<?php

namespace Gibbo\Lifx\Domain\Value;

use Assert\Assert;

/**
 * Describes the Brightness of a Lifx light.
 */
class Brightness
{

    private $value;


    public function __construct(float $value)
    {
        Assert::that($value)->float()->between(0, 1);

        $this->value = round($value, 1);
    }


    public static function maximum() : self
    {
        return new static(1);
    }


    public static function minimum() : self
    {
        return new static(0);
    }


    public function atMax() : bool
    {
        return $this->value === 1;
    }


    public function atMin() : bool
    {
        return $this->value === 0;
    }


    public function increase() : self
    {
        return new static($this->value + 0.1);
    }


    public function decrease() : self
    {
        return new static($this->value - 0.1);
    }


    public function toMaximum() : self
    {
        return static::maximum();
    }


    public function toMinimum() : self
    {
        return static::minimum();
    }


    public function value() : float
    {
        return $this->value;
    }
}