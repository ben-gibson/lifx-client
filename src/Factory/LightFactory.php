<?php

namespace Gibbo\Lifx\Factory;

use Gibbo\Lifx\Domain\Group;
use Gibbo\Lifx\Domain\Light;
use Gibbo\Lifx\Domain\Location;
use Gibbo\Lifx\Domain\State;
use Gibbo\Lifx\Domain\Value\Brightness;
use Gibbo\Lifx\Domain\Value\Colour;
use Gibbo\Lifx\Domain\Value\Id;
use Gibbo\Lifx\Domain\Value\Power;
use liampm\Swaddle\Swaddle;

class LightFactory
{

    public function create(\stdClass $description) : Light
    {
        $swaddle = Swaddle::wrapObject($description, true);

        $colourSwaddle   = $swaddle->getProperty('color');
        $groupSwaddle    = $swaddle->getProperty('group');
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
            $swaddle->getProperty('connected'),
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