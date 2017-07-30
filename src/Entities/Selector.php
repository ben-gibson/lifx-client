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
     * Random.
     *
     * @return static
     */
    public static function random()
    {
        return new static(static::all()->__toString().':random');
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
     * Group sector.
     *
     * @param Group $group
     *
     * @return static
     */
    public static function group(Group $group)
    {
        return new static(sprintf('group_id:%s', $group->getId()));
    }

    /**
     * Location sector.
     *
     * @param Location $location
     *
     * @return static
     */
    public static function location(Location $location)
    {
        return new static(sprintf('location_id:%s', $location->getId()));
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->value;
    }
}
