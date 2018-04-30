<?php

namespace awaluk\NextbikeClient\Tests;

use awaluk\NextbikeClient\Exception\FieldNotExistException;
use awaluk\NextbikeClient\Structure\System;
use PHPUnit\Framework\TestCase;

class StructureTest extends TestCase
{
    public function testGet()
    {
        $class = new \stdClass();
        $class->test_field = 'value';

        $system = new System($class);

        $this->assertEquals('value', $system->get('test_field'));
    }

    public function testGetWhenNotExists()
    {
        $this->expectException(FieldNotExistException::class);
        $this->expectExceptionMessage('Field "test_field" not exists');

        $class = new \stdClass();

        $system = new System($class);
        $system->get('test_field');
    }

    public function testHas()
    {
        $class = new \stdClass();
        $class->test_field = 'value';

        $system = new System($class);

        $this->assertTrue($system->has('test_field'));
    }

    public function testHasWhenNotExists()
    {
        $class = new \stdClass();

        $system = new System($class);

        $this->assertFalse($system->has('test_field'));
    }
}
