<?php

namespace Solis\Breaker\Tests;

use Solis\Breaker\Tests\Fixtures\Dummy\DummyThrower;

use PHPUnit\Framework\TestCase;

class DubugEntryTest extends TestCase
{

    private $thrower;

    public function setUp()
    {
        $this->thrower = new DummyThrower();
    }

    public function testHasExpectedClassName()
    {
        $exception = $this->thrower->getRuntimeExceptionInstance();
        $class     = $exception->getClassName();
        $this->assertEquals(
            'Solis\\Breaker\\Tests\\Fixtures\\Dummy\\DummyThrower',
            $class,
            'Expected class value has not been found'
        );
    }

    public function testHasExpectedMethodName()
    {
        $exception = $this->thrower->getRuntimeExceptionInstance();
        $method    = $exception->getMethodName();
        $this->assertEquals('getRuntimeExceptionInstance', $method, 'Expected method name has not been found');
    }

    public function testHasExpectedArgs()
    {
        $expectedArgs = [1, 2, 3];
        $exception    = $this->thrower->getRuntimeExceptionInstance($expectedArgs);
        $args         = $exception->getMethodArgs();
        $this->assertEquals([$expectedArgs], $args);
    }
}
