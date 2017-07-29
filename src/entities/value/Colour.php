<?php

namespace Gibbo\Lifx\Entities\Value;

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
     * @param float $hue
     * @param float $saturation
     * @param float $kelvin
     */
    public function __construct(float $hue, float $saturation, float $kelvin)
    {
        $this->hue        = $hue;
        $this->saturation = $saturation;
        $this->kelvin     = $kelvin;
    }
}