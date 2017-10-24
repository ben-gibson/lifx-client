<?php

namespace Gibbo\LifxTest\Unit\Domain;

use Gibbo\Lifx\Domain\Group;
use Gibbo\Lifx\Domain\Light;
use Gibbo\Lifx\Domain\Location;
use Gibbo\Lifx\Domain\State;
use Gibbo\Lifx\Domain\Value\Brightness;
use Gibbo\Lifx\Domain\Value\Colour;
use Gibbo\Lifx\Domain\Value\Id;
use Gibbo\Lifx\Domain\Value\Power;
use PHPUnit\Framework\TestCase;

class LightTest extends TestCase
{
    public function testReturnsExpectedId() : void
    {
        $id    = new Id('c34bb2');
        $light = $this->light($id);

        $this->assertTrue($light->id()->equals($id));
    }


    public function testReturnsExpectedLabel() : void
    {
        $label = 'Lounge front';
        $light = $this->light(null, $label);

        $this->assertSame($label, $light->label());
    }


    public function testReturnsExpectedGroup() : void
    {
        $group = new Group(new Id('c34bb2'), 'My Group');
        $light = $this->light(null, null, $group);

        $this->assertTrue($light->group()->equals($group));
    }


    public function testReturnsExpectedLocation() : void
    {
        $location = new Location(new Id('c34bb2'), 'My Location');
        $light    = $this->light(null, null, null, $location);

        $this->assertTrue($light->location()->equals($location));
    }


    public function testReturnsExpectedLastSeenDateTime() : void
    {
        $lastSeen = new \DateTimeImmutable('01-01-2017T00:00:00');
        $light    = $this->light(null, null, null, null, $lastSeen);

        $this->assertTrue($light->lastSeen()->getTimestamp() === $lastSeen->getTimestamp());
    }


    public function testSaysIfConnected() : void
    {
        $light = $this->light(null, null, null, null, null, true);

        $this->assertTrue($light->isConnected());

        $light = $this->light(null, null, null, null, null, false);

        $this->assertFalse($light->isConnected());
    }


    public function testSaysIfOn() : void
    {
        $light = $this->light(null, null, null, null, null, null, Power::on());

        $this->assertTrue($light->isOn());

        $light = $this->light(null, null, null, null, null, null, Power::off());

        $this->assertFalse($light->isOn());
    }


    public function testReturnsExpectedBrightness() : void
    {
        $brightness = Brightness::maximum();

        $light = $this->light(null, null, null, null, null, null, null, $brightness);

        $this->assertTrue($light->brightness()->equals($brightness));
    }


    public function testReturnsExpectedColour() : void
    {
        $colour = Colour::red();

        $light = $this->light(null, null, null, null, null, null, null, null, $colour);

        $this->assertTrue($light->colour()->equals($colour));
    }


    private function light(
        Id $id = null,
        string $label = null,
        Group $group = null,
        Location $location = null,
        \DateTimeImmutable $lastSeen = null,
        bool $connected = null,
        Power $power = null,
        Brightness $brightness = null,
        Colour $colour = null
    ) : Light {

        if ($id === null) {
            $id = new Id('c34bb2');
        }

        if ($label === null) {
            $label = 'Lounge front';
        }

        if ($group === null) {
            $group = new Group($id, 'My Group');
        }

        if ($location === null) {
            $location = new Location($id, 'My Location');
        }

        if ($lastSeen === null) {
            $lastSeen = new \DateTimeImmutable('01-01-2017T00:00:00');
        }

        if ($connected === null) {
            $connected = true;
        }

        if ($power === null) {
            $power = Power::on();
        }

        if ($brightness === null) {
            $brightness = Brightness::maximum();
        }

        if ($brightness === null) {
            $brightness = Brightness::maximum();
        }

        if ($colour === null) {
            $colour = Colour::green();
        }

        $state = new State($power, $brightness, $colour);

        return new Light($id, $label, $group, $location, $lastSeen, $connected, $state);
    }
}
