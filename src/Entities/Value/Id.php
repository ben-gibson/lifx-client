<?php

namespace Gibbo\Lifx\Entities\Value;

/**
 * An entity id.
 */
class Id
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
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @inheritdoc
     */
    public function __toString()
    {
        return $this->value;
    }
}