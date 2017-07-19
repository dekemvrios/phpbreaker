<?php

use Solis\Breaker\TException;

/**
 * Class TExceptionMock
 */
class TExceptionMock
{
    /**
     * TExceptionMock constructor.
     *
     * @throws TException
     */
    public function __construct()
    {
        throw new TException(
            __CLASS__,
            __METHOD__,
            'TException class sample',
            500
        );
    }
}

/**
 * Class TExceptionTest
 */
class TExceptionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return Exception|TException
     */
    public function testCanRaiseTException()
    {
        try {

            new TExceptionMock();

        } catch (TException $exception) {
            return $exception;
        }
        $this->fail('TException was not raised');
    }

    /**
     * @param TException $exception
     *
     * @depends testCanRaiseTException
     */
    public function testHasMessageEntry(TException $exception)
    {
        $message = $exception->getError()->getEntry('message');

        $this->assertEquals('TException class sample', $message, 'Expected message value has not been found');
    }

    /**
     * @param TException $exception
     *
     * @depends testCanRaiseTException
     */
    public function testHasCodeEntry(TException $exception)
    {
        $code = $exception->getError()->getEntry('code');

        $this->assertEquals(500, $code, 'Expected code value has not been found');
    }

    /**
     * @param TException $exception
     *
     * @depends testCanRaiseTException
     */
    public function testHasClassEntry(TException $exception)
    {
        $class = $exception->getDebug()->getEntry('class');

        $this->assertEquals('TExceptionMock', $class, 'Expected class value has not been found');
    }

    /**
     * @param TException $exception
     *
     * @depends testCanRaiseTException
     */
    public function testHasMethodEntry(TException $exception)
    {
        $method = $exception->getDebug()->getEntry('method');

        $this->assertEquals('TExceptionMock::__construct', $method, 'Expected method value has not been found');
    }
}