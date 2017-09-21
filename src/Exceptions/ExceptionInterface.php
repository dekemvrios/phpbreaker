<?php

/**
 * This file is part of the Breaker package.
 *
 * (c) Rafael Becker <rafael@beecker.com.br>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Solis\Breaker\Exceptions;

use Solis\Foundation\Arrays\ArrayContainer;

/**
 * Interface ExceptionInterface.
 *
 * @since   2.0.0
 *
 * @package Solis\Breaker\Exceptions
 * @author  Rafael Becker <rafael@beecker.com.br>
 */
interface ExceptionInterface extends \Throwable
{

    /**
     * Get the 'message' specified in the error entry of the component exception.
     *
     * @return string
     */
    public function getErrorMessage(): string;

    /**
     * Get the 'code' specified in the error entry of the component exception.
     *
     * @return int
     */
    public function getErrorCode(): int;

    /**
     * Get the 'class' specified in the debug entry of the component exception.
     *
     * @return string
     */
    public function getClassName(): string;

    /**
     * Get the 'method' specified in the debug entry of the component exception.
     *
     * @return string
     */
    public function getMethodName(): string;

    /**
     * Get the 'args' specified in the debug entry of the component exception.
     *
     * @return array
     */
    public function getMethodArgs(): array;

    /**
     * Get the Error entry of the component exception.
     *
     * @return ArrayContainer
     */
    public function getError(): ArrayContainer;

    /**
     * Set the Error entry of the component exception.
     *
     * @param ArrayContainer $error
     *
     * @return $this
     */
    public function setError(ArrayContainer $error);

    /**
     * Get the Debug entry of the component exception.
     *
     * @return ArrayContainer
     */
    public function getDebug(): ArrayContainer;

    /**
     * Set the Debug entry of the component exception.
     *
     * @param ArrayContainer $debug
     *
     * @return $this
     */
    public function setDebug(ArrayContainer $debug);

    /**
     * Get the component exception as an assoc array containing its error and debug
     * entry also as an array representation.
     *
     * @return array
     */
    public function toArray(): array;

    /**
     * Get the array representation of the component exception serialized
     * in json format.
     *
     * @return string
     */
    public function toJson(): string;

    /**
     * Get the Error entry serialized in json format.
     *
     * @return string
     */
    public function getErrorAsJson(): string;

    /**
     * Get the Debug entry serialized in json format.
     *
     * @return string
     */
    public function getDebugAsJson(): string;
}
