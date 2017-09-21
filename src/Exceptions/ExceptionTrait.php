<?php
/**
 * Breaker Exception Trait.
 *
 * This trait adds specific information to the exceptions if available.
 *
 * @package   Solis\Breaker\Exceptions
 * @author    Rafael Becker <rafael@beecker.com.br>
 * @license   MIT
 * @link      https://github.com/rafaelbeecker/phpbreaker
 * @copyright 2017 Rafael Becker
 */

namespace Solis\Breaker\Exceptions;

use Solis\Foundation\Arrays\ArrayContainer;

use Solis\Breaker\Helpful\StackInfo;
use Solis\Foundation\Serializer\JsonSerializer;

trait ExceptionTrait
{

    /**
     * @var ArrayContainer
     */
    protected $error;

    /**
     * @var ArrayContainer
     */
    protected $debug;

    public function getErrorMessage(): string
    {
        return $this->getError()->get('message');
    }

    public function getErrorCode(): int
    {
        return $this->getError()->get('code');
    }

    public function getClassName(): string
    {
        return $this->getDebug()->get('class');
    }

    public function getMethodName(): string
    {
        return $this->getDebug()->get('method');
    }

    public function getMethodArgs(): array
    {
        return $this->getDebug()->get('args');
    }

    public function getError(): ArrayContainer
    {
        return $this->error;
    }

    public function setError(ArrayContainer $error)
    {
        $this->error = $error;

        return $this;
    }

    public function getDebug(): ArrayContainer
    {
        return $this->debug;
    }

    public function setDebug(ArrayContainer $debug)
    {
        $this->debug = $debug;

        return $this;
    }

    public function getErrorAsJson() : string
    {
        return $this->getError()->toJson();
    }

    public function getDebugAsJson() : string
    {
        return $this->getDebug()->toJson();
    }

    public function toArray(): array
    {
        return [
                "error" => $this->getError()->toArray(),
                "debug" => $this->getDebug()->toArray(),
        ];
    }

    public function toJson(): string
    {
        return JsonSerializer::make()->encode($this->toArray(), 'json');
    }

    protected function setErrorDebugInformation(
        string $reason,
        int $code,
        array $stack = []
    ) {
        $stackInfo = new StackInfo($stack);

        $this->setError(ArrayContainer::make([
                'code'    => $code,
                'message' => $reason,
        ]));

        $this->setDebug(ArrayContainer::make([
                'class'  => $stackInfo->getClassNameFromLastStack(),
                'method' => $stackInfo->getMethodNameFromLastStack(),
                'args'   => $stackInfo->getArgsFromLastStack(),
        ]));

        return $this;
    }
}
