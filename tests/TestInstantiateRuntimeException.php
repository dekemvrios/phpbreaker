<?php

use Solis\Breaker\Exceptions\RuntimeException;
use PHPUnit\Framework\TestCase;

class TestInstantiateRuntimeException extends TestCase
{

    public function testCanIdentityExceptionAsThrowableInstance()
    {
        $this->setExpectedException('Throwable');
        throw new RuntimeException('RuntimeException sample message');
    }

    public function testCanIdentityExceptionAsRuntimeException()
    {
        $this->setExpectedException('RuntimeException');
        throw new RuntimeException('RuntimeException sample message');
    }

    public function testCanIdentifyExceptionAsBreakerRuntimeException()
    {
        $this->setExpectedException('Solis\\Breaker\\Exceptions\\RuntimeException');
        throw new RuntimeException('RuntimeException sample message');
    }

    public function testHasExpectedErrorMessage()
    {
        $exception = $this->getInstanceOfRuntimeExceptionForTest();
        $message   = $exception->getErrorMessage();
        $this->assertEquals('RuntimeException sample message', $message, 'Expected message value has not been found');
    }

    public function testHasExpectedErrorCode()
    {
        $exception = $this->getInstanceOfRuntimeExceptionForTest();
        $code      = $exception->getErrorCode();
        $this->assertEquals(500, $code, 'Expected code value has not been found');
    }

    public function testHasExpectedClassName()
    {
        $exception = $this->getInstanceOfRuntimeExceptionForTest();
        $class     = $exception->getClassName();
        $this->assertEquals('TestInstantiateRuntimeException', $class, 'Expected class value has not been found');
    }

    public function testHasExpectedMethodName()
    {
        $exception = $this->getInstanceOfRuntimeExceptionForTest();
        $method    = $exception->getMethodName();
        $this->assertEquals('getInstanceOfRuntimeExceptionForTest', $method, 'Expected method name has not been found');
    }

    public function testRuntimeExceptionHasValidJsonRepresentation()
    {
        $exception   = $this->getInstanceOfRuntimeExceptionForTest();
        $isValidJson = boolval(json_encode(json_decode($exception->toJson())));
        $this->assertEquals(true, $isValidJson, 'RuntimeException has not a valid json representation');
    }

    public function testErrorEntryHasValidJsonRepresentation()
    {
        $exception   = $this->getInstanceOfRuntimeExceptionForTest();
        $isValidJson = boolval(json_encode(json_decode($exception->getErrorAsJson())));
        $this->assertEquals(true, $isValidJson, 'RuntimeException error entry has not a valid json representation');
    }

    public function testDebugEntryHasValidJsonRepresentation()
    {
        $exception   = $this->getInstanceOfRuntimeExceptionForTest();
        $isValidJson = boolval(json_encode(json_decode($exception->getDebugAsJson())));
        $this->assertEquals(true, $isValidJson, 'RuntimeException debug entry has not a valid json representation');
    }

    private function getInstanceOfRuntimeExceptionForTest()
    {
        return new RuntimeException('RuntimeException sample message');
    }
}