<?php

namespace Solis\Breaker\Tests;

use PHPUnit\Framework\TestCase;
use Solis\Breaker\Tests\Fixtures\Dummy\DummyThrower;

class ExceptionTraitTest extends TestCase
{
    public function setUp()
    {
        $this->thrower = new DummyThrower();
    }

    public function testTraitHasExpectedErrorMessage()
    {
        $exception = $this->thrower->getRuntimeExceptionInstance();
        $message   = $exception->getErrorMessage();
        $this->assertEquals('RuntimeException sample message', $message, 'Expected message value has not been found');
    }

    public function testTraitHasExpectedErrorCode()
    {
        $exception = $this->thrower->getRuntimeExceptionInstance();
        $code      = $exception->getErrorCode();
        $this->assertEquals(500, $code, 'Expected code value has not been found');
    }

    public function testTraitHasExpectedClassName()
    {
        $exception = $this->thrower->getRuntimeExceptionInstance();
        $class     = $exception->getClassName();
        $this->assertEquals(
            'Solis\\Breaker\\Tests\\Fixtures\\Dummy\\DummyThrower',
            $class,
            'Expected class value has not been found'
        );
    }

    public function testTraitHasExpectedMethodName()
    {
        $exception = $this->thrower->getRuntimeExceptionInstance();
        $method    = $exception->getMethodName();
        $this->assertEquals('getRuntimeExceptionInstance', $method, 'Expected method name has not been found');
    }

    public function testTraitHasExpectedArgs()
    {
        $expectedArgs = [1, 2, 3];
        $exception    = $this->thrower->getRuntimeExceptionInstance($expectedArgs);
        $args         = $exception->getMethodArgs();
        $this->assertEquals([$expectedArgs], $args);
    }

    public function testTraitHasValidJsonRepresentation()
    {
        $exception   = $this->thrower->getRuntimeExceptionInstance();
        $isValidJson = boolval(json_encode(json_decode($exception->toJson())));
        $this->assertEquals(true, $isValidJson, 'RuntimeException has not a valid json representation');
    }

    public function testTraitHasValidErrorInJsonFormat()
    {
        $exception   = $this->thrower->getRuntimeExceptionInstance();
        $isValidJson = boolval(json_encode(json_decode($exception->getErrorAsJson())));
        $this->assertEquals(true, $isValidJson, 'RuntimeException error entry has not a valid json representation');
    }

    public function testTraitHasValidDebugInJsonFormat()
    {
        $exception   = $this->thrower->getRuntimeExceptionInstance();
        $isValidJson = boolval(json_encode(json_decode($exception->getDebugAsJson())));
        $this->assertEquals(true, $isValidJson, 'RuntimeException debug entry has not a valid json representation');
    }
}
