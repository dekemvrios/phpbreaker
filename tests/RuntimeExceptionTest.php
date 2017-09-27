<?php

namespace Solis\Breaker\Tests;

use PHPUnit\Framework\TestCase;

use Solis\Breaker\Exceptions\RuntimeException;

class RuntimeExceptionTest extends TestCase
{
    public function testCanIdentityExceptionAsThrowableInstance()
    {
        $this->expectException('Throwable');
        throw new RuntimeException('RuntimeException sample message');
    }

    public function testCanIdentityExceptionAsRuntimeException()
    {
        $this->expectException('RuntimeException');
        throw new RuntimeException('RuntimeException sample message');
    }

    public function testCanIdentifyExceptionAsBreakerRuntimeException()
    {
        $this->expectException('Solis\\Breaker\\Exceptions\\RuntimeException');
        throw new RuntimeException('RuntimeException sample message');
    }
}
