<?php

use Solis\Breaker\Exceptions\RuntimeException;
use PHPUnit\Framework\TestCase;

/**
 * Class SolisExceptionMock
 */
class RuntimeExceptionMock
{

    public function getRuntimeExceptionForTest()
    {
        return new RuntimeException('RuntimeException sample message');
    }
}

/**
 * Class TExceptionTest
 */
class TestInstantiateRuntimeException extends TestCase
{

    public function testInstanceOfBreakerRuntimeExceptionInterface()
    {
        $exception = (new RuntimeExceptionMock())->getRuntimeExceptionForTest();
        $this->assertInstanceOf('Solis\\Breaker\\Exceptions\\RuntimeExceptionInterface', $exception,
                                'Expected exception is not instance of Breaker RuntimeExceptionInterface');
    }

    public function testInstanceOfBreakerFriendlyExceptionInterface()
    {
        $exception = (new RuntimeExceptionMock())->getRuntimeExceptionForTest();
        $this->assertInstanceOf('Solis\\Breaker\\Exceptions\\FriendlyExceptionInterface', $exception,
                                'Expected exception is not instance of Breaker FriendlyExceptionInterface');
    }

    public function testInstanceOfSplRuntimeException()
    {
        $exception = (new RuntimeExceptionMock())->getRuntimeExceptionForTest();
        $this->assertInstanceOf('RuntimeException', $exception,
                                'Expected exception is not instance of StandardRuntimeException');
    }

    public function testInstanceOfThrowable()
    {
        $exception = (new RuntimeExceptionMock())->getRuntimeExceptionForTest();
        $this->assertInstanceOf('Throwable', $exception, 'Expected exception is not instance of Throwable');
    }

    public function testHasErrorMessage()
    {
        $exception = (new RuntimeExceptionMock())->getRuntimeExceptionForTest();
        $message   = $exception->getErrorMessage();
        $this->assertEquals('RuntimeException sample message', $message, 'Expected message value has not been found');
    }

    public function testHasErrorCode()
    {
        $exception = (new RuntimeExceptionMock())->getRuntimeExceptionForTest();
        $code      = $exception->getErrorCode();
        $this->assertEquals(500, $code, 'Expected code value has not been found');
    }

    public function testHasClassName()
    {
        $exception = (new RuntimeExceptionMock())->getRuntimeExceptionForTest();
        $class     = $exception->getClassName();
        $this->assertEquals('RuntimeExceptionMock', $class, 'Expected class value has not been found');
    }

    public function testHasMethodName()
    {
        $exception = (new RuntimeExceptionMock())->getRuntimeExceptionForTest();
        $method    = $exception->getMethodName();
        $this->assertEquals('getRuntimeExceptionForTest', $method, 'Expected method value has not been found');
    }

    public function testExceptionHasValidJson()
    {
        $exception   = (new RuntimeExceptionMock())->getRuntimeExceptionForTest();
        $isValidJson = boolval(json_encode(json_decode($exception->toJson())));
        $this->assertEquals(true, $isValidJson, 'RuntimeException has not a valid json representation');
    }

    public function testErrorHasValidJson()
    {
        $exception   = (new RuntimeExceptionMock())->getRuntimeExceptionForTest();
        $isValidJson = boolval(json_encode(json_decode($exception->getErrorAsJson())));
        $this->assertEquals(true, $isValidJson, 'RuntimeException error entry has not a valid json representation');
    }

    public function testDebugHasValidJson()
    {
        $exception   = (new RuntimeExceptionMock())->getRuntimeExceptionForTest();
        $isValidJson = boolval(json_encode(json_decode($exception->getDebugAsJson())));
        $this->assertEquals(true, $isValidJson, 'RuntimeException debug entry has not a valid json representation');
    }
}