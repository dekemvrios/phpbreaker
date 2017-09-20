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
        $trace = $this->getLastStackTrace();

        return $this->getIndexOf($trace, 'class');
    }

    public function getMethodNameFromLastStack(): string
    {
        $trace = $this->getLastStackTrace();

        return $this->getIndexOf($trace, 'function');
    }

    public function getArgsFromLastStack(): array
    {
        $trace = $this->getLastStackTrace();

        return $this->getIndexOf($trace, 'args');
    }

    protected function getLastStackTrace(): array
    {
        return $this->getIndexOf($this->trace, 0);
    }

    /**
     * @return array|mixed
     */
    protected function getIndexOf($array, $index)
    {
        return $array[$index] ?? [];
    }
}
