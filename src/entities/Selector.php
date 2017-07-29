<?php

namespace Gibbo\Lifx\Entities;

/**
 * A Selector.
 *
 * @see https://api.developer.lifx.com/v1/docs/selectors
 */
class Selector
{
    /**
     * @var string
     */
    private $value;

    /**
     * Constructor.
     *
     * @param string $value
     */
    private function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * All sector.
     *
     * @return static
     */
    public static function all()
    {
        return new static('all');
    }

    /**
     * Single light sector.
     *
     * @param Light $light
     *
     * @return static
     */
    public static function light(Light $light)
    {
        return new static(sprintf('id:%s', $light->getId()));
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->value;
    }
}
