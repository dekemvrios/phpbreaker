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

use \BadMethodCallException as StandardBadMethodCallException;

/**
 * StandardBadMethodCallException.
 *
 * This exception should be thrown if a callback refers to an undefined method
 *
 * @package Solis\Breaker\Exceptions
 * @author  Rafael Becker <rafael@beecker.com.br>
 */
class BadMethodCallException extends StandardBadMethodCallException implements ExceptionInterface
{

    use ExceptionTrait;

    /**
     * Create a new RuntimeException instance.
     *
     * @param string $reason
     * @param int    $code
     */
    public function __construct($reason, $code = 500)
    {
        $this->setExceptionDetails($reason, $code, $this->getTrace());

        parent::__construct($this->getErrorMessage(), $this->getErrorCode());
    }
}