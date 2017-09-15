<?php

use Solis\Breaker\Exceptions\RuntimeException;
use Solis\Breaker\Exceptions\RuntimeExceptionInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class SolisExceptionMock
 */
class RuntimeExceptionMock
{

    public function methodWithException()
    {
        throw new RuntimeException('RuntimeException sample message');
    }
}
/**
 * Class TExceptionTest
 */
class RuntimeExceptionTest extends TestCase
{
    /**
     * @return RuntimeExceptionInterface
     */
    public function testCanRaiseRuntimeException()
    {
        try {
            (new RuntimeExceptionMock())->methodWithException();
        } catch (RuntimeExceptionInterface $e) {
            return $e;
        }
        $this->fail('RuntimeException was not raised');
    }

    /**
     * @depends testCanRaiseRuntimeException
     */
    public function testHasErrorMessage(RuntimeExceptionInterface $exception)
    {
        $message = $exception->getErrorMessage();
        $this->assertEquals('RuntimeException sample message', $message, 'Expected message value has not been found');
    }

    /**
     * @depends testCanRaiseRuntimeException
     */
    public function testHasErrorCode(RuntimeExceptionInterface $exception)
    {
        $code = $exception->getErrorCode();
        $this->assertEquals(500, $code, 'Expected code value has not been found');
    }

    /**
     * @depends testCanRaiseRuntimeException
     */
    public function testHasClassName(RuntimeExceptionInterface $exception)
    {
        $class = $exception->getClassName();
        $this->assertEquals('RuntimeExceptionMock', $class, 'Expected class value has not been found');
    }
    /**
     * @depends testCanRaiseRuntimeException
     */
    public function testHasMethodName(RuntimeExceptionInterface $exception)
    {
        $method = $exception->getMethodName();
        $this->assertEquals('methodWithException', $method, 'Expected method value has not been found');
    }
}