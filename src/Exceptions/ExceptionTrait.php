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

use Solis\Breaker\StackInfo;
use Solis\Foundation\Serializer\JsonSerializer;

/**
 * Breaker Exception Trait.
 *
 * This trait adds specific information to the exceptions if available.
 *
 * @package   Solis\Breaker\Exceptions
 * @author    Rafael Becker <rafael@beecker.com.br>
 */
trait ExceptionTrait
{

    /**
     * Soft information about the exception.
     *
     * @var ArrayContainer
     */
    protected $error;

    /**
     * Debug information about the exception.
     *
     * @var ArrayContainer
     */
    protected $debug;

    /**
     * Get the 'message' specified in the error entry of the component exception.
     *
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->getError()->get('message');
    }

    /**
     * Get the 'code' specified in the error entry of the component exception.
     *
     * @return int
     */
    public function getErrorCode(): int
    {
        return $this->getError()->get('code');
    }

    /**
     * Get the 'class' specified in the debug entry of the component exception.
     *
     * @return string
     */
    public function getClassName(): string
    {
        return $this->getDebug()->get('class');
    }

    /**
     * Get the 'method' specified in the debug entry of the component exception.
     *
     * @return string
     */
    public function getMethodName(): string
    {
        return $this->getDebug()->get('method');
    }

    /**
     * Get the 'args' specified in the debug entry of the component exception.
     *
     * @return array
     */
    public function getMethodArgs(): array
    {
        return $this->getDebug()->get('args');
    }

    /**
     * Get the Error entry of the component exception.
     *
     * @return ArrayContainer
     */
    public function getError(): ArrayContainer
    {
        return $this->error;
    }

    /**
     * Set the Error entry of the component exception.
     *
     * @param ArrayContainer $error
     *
     * @return $this
     */
    public function setError(ArrayContainer $error)
    {
        $this->error = $error;

        return $this;
    }

    /**
     * Get the Debug entry of the component exception.
     *
     * @return ArrayContainer
     */
    public function getDebug(): ArrayContainer
    {
        return $this->debug;
    }

    /**
     * Set the Debug entry of the component exception.
     *
     * @param ArrayContainer $debug
     *
     * @return $this
     */
    public function setDebug(ArrayContainer $debug)
    {
        $this->debug = $debug;

        return $this;
    }

    /**
     * Get the Error entry serialized in json format.
     *
     * @return string
     */
    public function getErrorAsJson(): string
    {
        return $this->getError()->toJson();
    }

    /**
     * Get the Debug entry serialized in json format.
     *
     * @return string
     */
    public function getDebugAsJson(): string
    {
        return $this->getDebug()->toJson();
    }

    /**
     * Get the component exception as an assoc array containing its error and debug
     * entry also as an array representation.
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
                "error" => $this->getError()->toArray(),
                "debug" => $this->getDebug()->toArray(),
        ];
    }

    /**
     * Get the array representation of the component exception serialized
     * in json format.
     *
     * @return string
     */
    public function toJson(): string
    {
        return JsonSerializer::make()->encode($this->toArray(), 'json');
    }

    /**
     * Set the exception details, building its error and debug entry.
     *
     * @param string $reason
     * @param int    $code
     * @param array  $stack
     */
    protected function setExceptionDetails(string $reason, int $code, array $stack = [])
    {
        $this->setErrorDetails($reason, $code);

        $this->setDebugDetails($stack);
    }

    /**
     * Set the exception debug details
     *
     * @param array $stack
     */
    protected function setDebugDetails(array $stack)
    {
        $stackInfo = new StackInfo($stack);
        $this->setDebug(ArrayContainer::make([
                'class'  => $stackInfo->getClassNameFromLastStack(),
                'method' => $stackInfo->getMethodNameFromLastStack(),
                'args'   => $stackInfo->getArgsFromLastStack(),
        ]));
    }

    /**
     * Set the exception error details
     *
     * @param string $reason
     * @param int    $code
     */
    protected function setErrorDetails(string $reason, int $code)
    {
        $this->setError(ArrayContainer::make([
                'code'    => $code,
                'message' => $reason,
        ]));
    }
}
