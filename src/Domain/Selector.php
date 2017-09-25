<?php

namespace Gibbo\Lifx\Domain;

/**
 * Describes a selection of lights from which the state can be consistently manipulated.
 *
 * @see https://api.developer.lifx.com/v1/docs/selectors
 */
class Selector
{
    private $value;


    private function __construct(string $value)
    {
        $this->value = $value;
    }


    public static function all() : self
    {
        return new static('all');
    }


    public static function random() : self
    {
        return new static(static::all()->toString().':random');
    }


    public static function light(Light $light) : self
    {
        return new static(sprintf('id:%s', $light->id()));
    }


    public static function group(Group $group) : self
    {
        return new static(sprintf('group_id:%s', $group->id()));
    }


    public static function location(Location $location) : self
    {
        return new static(sprintf('location_id:%s', $location->id()));
    }


    public function toString() : string
    {
        return $this->__toString();
    }


    public function __toString() : string
    {
        return $this->value;
    }
}
