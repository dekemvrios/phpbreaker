<?php

namespace Solis\Breaker\Tests;

use PHPUnit\Framework\TestCase;

use Solis\Breaker\Exceptions\BadMethodCallException;

class BadMethodCallExceptionTest extends TestCase
{
    public function testCanIdentityExceptionAsThrowableInstance()
    {
        $this->expectException('Throwable');
        throw new BadMethodCallException('BadMethodCallException sample message');
    }

    public function testCanIdentityExceptionAsBadMethodCallException()
    {
        $this->expectException('BadMethodCallException');
        throw new BadMethodCallException('BadMethodCallException sample message');
    }

    public function testCanIdentifyExceptionAsBreakerRuntimeException()
    {
        $this->expectException('Solis\\Breaker\\Exceptions\\BadMethodCallException');
        throw new BadMethodCallException('BadMethodCallException sample message');
    }
}
