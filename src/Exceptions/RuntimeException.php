<?php
/**
 * Breaker Runtime Exception.
 *
 * This exception is thrown if an error which can only be found on runtime
 * occurs.
 *
 * @package   Solis\Breaker\Exceptions
 * @author    Rafael Becker <rafael@beecker.com.br>
 * @license   MIT
 * @link      https://github.com/rafaelbeecker/phpbreaker
 * @copyright 2017 Rafael Becker
 */

namespace Solis\Breaker\Exceptions;

use RuntimeException as StandardRuntimeException;

/**
 * Class RuntimeException.
 *
 * @since   2.0.0
 *
 * @package Solis\Breaker\Exceptions
 * @author  Rafael Becker <rafael@beecker.com.br>
 */
final class RuntimeException extends StandardRuntimeException implements ExceptionInterface
{

    use ExceptionTrait;

    /**
     * Create a new RuntimeException instance.
     *
     * @param string $reason
     * @param int    $code
     */
    public function __construct(
        $reason,
        $code = 500
    ) {
        $this->setExceptionDetails($reason, $code, $this->getTrace());

        parent::__construct($this->getErrorMessage(), $this->getErrorCode());
    }
}
