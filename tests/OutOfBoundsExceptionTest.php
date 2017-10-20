<?php

namespace Solis\Breaker\Tests;

use PHPUnit\Framework\TestCase;

use Solis\Breaker\Exceptions\OutOfBoundsException;

class OutOfBoundsExceptionTest extends TestCase
{
    public function testCanIdentityExceptionAsThrowableInstance()
    {
        $this->expectException('Throwable');
        throw new OutOfBoundsException('OutOfBoundsException sample message');
    }

    public function testCanIdentityExceptionAsOutOfBoundsException()
    {
        $this->expectException('OutOfBoundsException');
        throw new OutOfBoundsException('OutOfBoundsException sample message');
    }

    public function testCanIdentifyExceptionAsBreakerRuntimeException()
    {
        $this->expectException('Solis\\Breaker\\Exceptions\\OutOfBoundsException');
        throw new OutOfBoundsException('OutOfBoundsException sample message');
    }
}
