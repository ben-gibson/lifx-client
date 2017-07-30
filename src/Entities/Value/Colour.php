<?php

namespace Gibbo\Lifx\Entities\Value;

use Assert\Assert;

/**
 * Colour.
 */
class Colour
{
    /**
     * @var float
     */
    private $hue;

    /**
     * @var float
     */
    private $saturation;

    /**
     * @var float
     */
    private $kelvin;

    /**
     * Constructor.
     *
     * @param float $hue
     * @param float $saturation
     * @param int $kelvin
     */
    public function __construct(float $hue = null, float $saturation = null, int $kelvin = null)
    {
        Assert::that($hue)->nullOr()->float()->between(0, 360);
        Assert::that($saturation)->nullOr()->float()->between(0, 1.0);
        Assert::that($kelvin)->nullOr()->integer()->between(2500, 9000);

        $this->hue        = round($hue, 1);
        $this->saturation = round($saturation, 1);
        $this->kelvin     = $kelvin;
    }

    /**
     * Create as a measure of kelvin.
     *
     * @param int $value
     *
     * @return static
     */
    public static function kelvin(int $value)
    {
        return new static(null, null, $value);
    }

    /**
     * Create as a measure of hue.
     *
     * @param float $hue
     * @param float $saturation
     *
     * @return static
     */
    public static function hue(float $hue, float $saturation)
    {
        return new static($hue, $saturation, null);
    }

    /**
     * Red.
     *
     * @return static
     */
    public static function red()
    {
        return static::hue(0, 1);
    }

    /**
     * Green
     *
     * @return static
     */
    public static function green()
    {
        return static::hue(120, 1);
    }

    /**
     * @inheritdoc
     */
    public function __toString()
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