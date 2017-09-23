<?php

namespace Solis\Breaker\Tests;

use Solis\Breaker\Exceptions\RuntimeException;
use PHPUnit\Framework\TestCase;

class IdentifyInstanceTest extends TestCase
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
