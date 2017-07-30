<?php

namespace Gibbo\Lifx\Entities;

use Gibbo\Lifx\Entities\Value\Id;

/**
 * Location
 */
class Location
{
    /**
     * @var Id
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * Constructor.
     *
     * @param Id $id
     * @param string $name
     */
    public function __construct(Id $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Get the id.
     *
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * Get the name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}