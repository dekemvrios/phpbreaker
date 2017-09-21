<?php

namespace Solis\Breaker;

use Solis\Foundation\Arrays\ArrayCollection;

/**
 * Class StackInfo
 *
 * @package Solis\Breaker\Helpful
 */
class StackInfo
{

    private $collection;

    public function __construct($trace = [])
    {
        $this->collection = new ArrayCollection($trace);
    }

    public function getClassNameFromLastStack(): string
    {
        $trace = $this->collection->first();

        return $trace->get('class') ?? '';
    }

    public function getMethodNameFromLastStack(): string
    {
        $trace = $this->collection->first();

        return $trace->get('function') ?? '';
    }

    public function getArgsFromLastStack(): array
    {
        $trace = $this->collection->first();

        return $trace->get('args') ?? [];
    }

    public function getLastStackTrace(): array
    {
        $last = $this->collection->first();

        return $last ? $last->toArray() : [];
    }
}
