<?php

namespace Solis\Breaker\Tests;

use PHPUnit\Framework\TestCase;

use Solis\Breaker\Exceptions\InvalidArgumentException;

class InvalidArgumentExceptionTest extends TestCase
{
    public function testCanIdentityExceptionAsThrowableInstance()
    {
        $this->expectException('Throwable');
        throw new InvalidArgumentException('InvalidArgumentException sample message');
    }

    public function testCanIdentityExceptionAsInvalidArgumentException()
    {
        $this->expectException('InvalidArgumentException');
        throw new InvalidArgumentException('InvalidArgumentException sample message');
    }

    public function testCanIdentifyExceptionAsBreakerRuntimeException()
    {
        $this->expectException('Solis\\Breaker\\Exceptions\\InvalidArgumentException');
        throw new InvalidArgumentException('InvalidArgumentException sample message');
    }
}
