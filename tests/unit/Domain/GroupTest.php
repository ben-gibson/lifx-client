<?php

namespace Gibbo\LifxTest\Unit\Domain;

use Gibbo\Lifx\Domain\Group;
use Gibbo\Lifx\Domain\Value\Id;
use PHPUnit\Framework\TestCase;

class GroupTest extends TestCase
{
    public function testReturnsExpectedId() : void
    {
        $id    = new Id('c34bb2');
        $group = new Group($id, 'My Group');

        $this->assertSame($id, $group->id());
    }

    public function testReturnsExpectedName() : void
    {
        $name  = 'My Group';
        $group = new Group(new Id('c34bb2'), $name);

        $this->assertSame($name, $group->name());
    }

    public function testCanBeCastToString() : void
    {
        $name  = 'My Group';
        $group = new Group(new Id('c34bb2'), $name);

        $this->assertSame($name, $group->toString());
    }
}
