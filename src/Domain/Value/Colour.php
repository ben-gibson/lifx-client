<?php

namespace Gibbo\Lifx\Domain\Value;

use Assert\Assert;

/**
 * Describes the colour of a Lifx light.
 */
class Colour
{
    private $hue;

    private $saturation;

    private $kelvin;


    public function __construct(float $hue = null, float $saturation = null, int $kelvin = null)
    {
        Assert::that($hue)->nullOr()->float()->between(0, 360);
        Assert::that($saturation)->nullOr()->float()->between(0, 1.0);
        Assert::that($kelvin)->nullOr()->integer()->between(2500, 9000);

        $this->hue        = round($hue, 1);
        $this->saturation = round($saturation, 1);
        $this->kelvin     = $kelvin;
    }


    public static function kelvin(int $value) : self
    {
        return new static(null, null, $value);
    }


    public static function hue(float $hue, float $saturation) : self
    {
        return new static($hue, $saturation, null);
    }


    public static function red() : self
    {
        return static::hue(0, 1);
    }


    public static function green() : self
    {
        return static::hue(120, 1);
    }


    public function toString() : string
    {
        return $this->__toString();
    }


    public function __toString() : string
    {
        $colour = '';

        if ($this->hue !== null) {
            $colour .= sprintf(' hue:%.1f', $this->hue);
        }

        if ($this->saturation !== null) {
            $colour .= sprintf(' saturation:%.1f', $this->saturation);
        }

        if ($this->kelvin !== null) {
            $colour .= sprintf(' kelvin:%d', $this->kelvin);
        }

        return trim($colour);
    }
}