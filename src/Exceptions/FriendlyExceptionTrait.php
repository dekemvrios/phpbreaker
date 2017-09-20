<?php

namespace Solis\Breaker\Exceptions;

use Solis\Breaker\Helpful\AbstractDataContainer;
use Solis\Breaker\Helpful\ExceptionDataContainer;
use Solis\Breaker\Helpful\StackInfo;

/**
 * Trait FriendlyExceptionTrait
 *
 * @package Solis\Breaker\Exceptions
 */
trait FriendlyExceptionTrait
{

    /**
     * @var AbstractDataContainer
     */
    protected $error;

    /**
     * @var AbstractDataContainer
     */
    protected $debug;

    public function getErrorMessage(): string
    {
        return $this->getError()->getEntry('message');
    }

    public function getErrorCode(): int
    {
        return $this->getError()->getEntry('code');
    }

    public function getClassName(): string
    {
        return $this->getDebug()->getEntry('class');
    }

    public function getMethodName(): string
    {
        return $this->getDebug()->getEntry('method');
    }

    public function getMethodArgs(): array
    {
        return $this->getDebug()->getEntry('args');
    }

    public function getError(): AbstractDataContainer
    {
        return $this->error;
    }

    public function setError(AbstractDataContainer $error)
    {
        $this->error = $error;

        return $this;
    }

    public function getDebug(): AbstractDataContainer
    {
        return $this->debug;
    }

    public function setDebug(AbstractDataContainer $debug)
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
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    protected function setErrorDebugInformation(
        string $reason,
        int $code,
        array $stack = []
    ) {
        $stackInfo = new StackInfo($stack);

        $this->setError(ExceptionDataContainer::make([
                'code'    => $code,
                'message' => $reason,
        ]));

        $this->setDebug(ExceptionDataContainer::make([
                'class'  => $stackInfo->getClassNameFromLastStack(),
                'method' => $stackInfo->getMethodNameFromLastStack(),
                'args'   => $stackInfo->getArgsFromLastStack(),
        ]));

        return $this;
    }
}
