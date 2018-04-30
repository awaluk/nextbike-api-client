<?php

namespace awaluk\NextbikeClient\Tests;

use awaluk\NextbikeClient\Collection\SystemCollection;
use awaluk\NextbikeClient\Structure\System;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function testGetAll()
    {
        $class1 = new \stdClass();
        $class1->name = 'test1';

        $class2 = new \stdClass();
        $class2->name = 'test2';

        $systemCollection = new SystemCollection([$class1, $class2]);

        $systems = $systemCollection->getAll();

        $this->assertInstanceOf(System::class, $systems[1]);
        $this->assertEquals('test2', $systems[1]->getName());
    }

    public function testGetAllWhenEmpty()
    {
        $systemCollection = new SystemCollection([]);

        $systems = $systemCollection->getAll();

        $this->assertEmpty($systems);
    }

    public function testGetFirst()
    {
        $class1 = new \stdClass();
        $class1->name = 'test1';

        $class2 = new \stdClass();
        $class2->name = 'test2';

        $systemCollection = new SystemCollection([$class1, $class2]);

        $system = $systemCollection->getFirst();

        $this->assertInstanceOf(System::class, $system);
        $this->assertEquals('test1', $system->getName());
    }

    public function testIsEmpty()
    {
        $systemCollection = new SystemCollection([]);

        $this->assertTrue($systemCollection->isEmpty());
    }

    public function testCount()
    {
        $data = [new \stdClass(), new \stdClass(), new \stdClass()];

        $systemCollection = new SystemCollection($data);

        $this->assertEquals(3, $systemCollection->count());
    }
}
