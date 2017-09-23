<?php

namespace Solis\Breaker\Tests\Fixtures\Dummy;

use Solis\Breaker\Exceptions\RuntimeException;

class DummyThrower
{

    public function getRuntimeExceptionInstance()
    {
        return new RuntimeException('RuntimeException sample message');
    }
}
