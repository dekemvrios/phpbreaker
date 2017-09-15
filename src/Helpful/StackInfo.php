<?php

namespace Solis\Breaker\Helpful;

/**
 * Class StackInfo
 *
 * @package Solis\Breaker\Helpful
 */
class StackInfo
{
    private $trace = [];

    public function __construct($trace = [])
    {
        $this->trace = $trace;
    }

    public function getClassNameFromLastStack(): string
    {
        $trace = $this->getLastStackTrace() ?? [];

        return $trace['class'] ?? '';
    }

    public function getMethodNameFromLastStack(): string
    {
        $trace = $this->getLastStackTrace() ?? [];

        return $trace['function'] ?? '';
    }

    public function getArgsFromLastStack(): array
    {
        $trace = $this->getLastStackTrace() ?? [];

        return $trace['args'] ?? [];
    }

    protected function getLastStackTrace()
    {
        return $this->trace[0];
    }
}
