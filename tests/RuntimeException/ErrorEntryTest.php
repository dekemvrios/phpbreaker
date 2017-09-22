<?php

namespace Solis\Breaker\Tests;

use Solis\Breaker\Tests\Fixtures\Dummy\DummyThrower;

use PHPUnit\Framework\TestCase;

class ErrorEntryTest extends TestCase
{
    private $thrower;

    public function setUp()
    {
        $this->thrower = new DummyThrower();
    }

    public function testHasExpectedErrorMessage()
    {
        $exception = $this->thrower->getRuntimeExceptionInstance();
        $message   = $exception->getErrorMessage();
        $this->assertEquals('RuntimeException sample message', $message, 'Expected message value has not been found');
    }

    public function testHasExpectedErrorCode()
    {
        $exception = $this->thrower->getRuntimeExceptionInstance();
        $code      = $exception->getErrorCode();
        $this->assertEquals(500, $code, 'Expected code value has not been found');
    }
}