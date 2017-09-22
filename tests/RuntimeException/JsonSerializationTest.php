<?php

namespace Solis\Breaker\Tests;

use Solis\Breaker\Tests\Fixtures\Dummy\DummyThrower;

use PHPUnit\Framework\TestCase;

class JsonSerializationTest extends TestCase
{
    private $thrower;

    public function setUp()
    {
        $this->thrower = new DummyThrower();
    }

    public function testRuntimeExceptionHasValidJsonRepresentation()
    {
        $exception   = $this->thrower->getRuntimeExceptionInstance();
        $isValidJson = boolval(json_encode(json_decode($exception->toJson())));
        $this->assertEquals(true, $isValidJson, 'RuntimeException has not a valid json representation');
    }

    public function testErrorEntryHasValidJsonRepresentation()
    {
        $exception   = $this->thrower->getRuntimeExceptionInstance();
        $isValidJson = boolval(json_encode(json_decode($exception->getErrorAsJson())));
        $this->assertEquals(true, $isValidJson, 'RuntimeException error entry has not a valid json representation');
    }

    public function testDebugEntryHasValidJsonRepresentation()
    {
        $exception   = $this->thrower->getRuntimeExceptionInstance();
        $isValidJson = boolval(json_encode(json_decode($exception->getDebugAsJson())));
        $this->assertEquals(true, $isValidJson, 'RuntimeException debug entry has not a valid json representation');
    }
}