<?php

namespace Gibbo\Lifx\Factory;

use Gibbo\Lifx\Description;
use Gibbo\Lifx\Entities\Group;
use Gibbo\Lifx\Entities\Light;
use Gibbo\Lifx\Entities\Location;
use Gibbo\Lifx\Entities\State;
use Gibbo\Lifx\Entities\Value\Brightness;
use Gibbo\Lifx\Entities\Value\Colour;
use Gibbo\Lifx\Entities\Value\Id;
use Gibbo\Lifx\Entities\Value\Power;
use liampm\Swaddle\Swaddle;

/**
 * A factory to create Lifx lights from a description.
 */
class LightFactory
{
    /**
     * Create a light from a description.
     *
     * @param \stdClass $description
     *
     * @return Light
     */
    public function create(\stdClass $description): Light
    {
        $swaddle = Swaddle::wrapObject($description, true);

        $colourSwaddle = $swaddle->getProperty('color');
        $groupSwaddle = $swaddle->getProperty('group');
        $locationSwaddle = $swaddle->getProperty('location');

        return new Light(
            new Id($swaddle->getProperty('id')),
            $swaddle->getProperty('label'),
            new Group(
                new Id($groupSwaddle->getProperty('id')),
                $groupSwaddle->getProperty('name')
            ),
            new Location(
                new Id($locationSwaddle->getProperty('id')),
                $locationSwaddle->getProperty('name')
            ),
            new \DateTimeImmutable($swaddle->getProperty('last_seen')),
            new State(
                ($swaddle->getProperty('power') === 'on') ? Power::on() : Power::off(),
                new Brightness($swaddle->getProperty('brightness')),
                new Colour(
                    $colourSwaddle->getProperty('hue'),
                    $colourSwaddle->getProperty('saturation'),
                    $colourSwaddle->getProperty('kelvin')
                )
            )
        );
    }
}