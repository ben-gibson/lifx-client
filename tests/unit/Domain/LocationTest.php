<?php

namespace Gibbo\LifxTest\Unit\Domain;

use Gibbo\Lifx\Domain\Location;
use Gibbo\Lifx\Domain\Value\Id;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
    public function testReturnsExpectedId() : void
    {
        $id    = new Id('c34bb2');
        $location = new Location($id, 'My Location');

        $this->assertSame($id, $location->id());
    }

    public function testReturnsExpectedName() : void
    {
        $name  = 'My Location';
        $location = new Location(new Id('c34bb2'), $name);

        $this->assertSame($name, $location->name());
    }

    public function testCanBeCastToString() : void
    {
        $name  = 'My Location';
        $location = new Location(new Id('c34bb2'), $name);

        $this->assertSame($name, $location->toString());
    }
}
