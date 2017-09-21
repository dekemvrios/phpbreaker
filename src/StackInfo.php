<?php
/**
 * This file is part of the Breaker package.
 *
 * (c) Rafael Becker <rafael@beecker.com.br>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Solis\Breaker;

use Solis\Foundation\Arrays\ArrayCollection;

/**
 * Class StackInfo
 *
 * @package Solis\Breaker\Helpful
 */
class StackInfo
{

    /**
     * The Collection use to hold the Exception trace
     *
     * @var ArrayCollection
     */
    private $collection;

    /**
     * Create a new StackInfo instance from an supplied stack trace
     *
     * @param array $trace
     */
    public function __construct($trace = [])
    {
        $this->collection = new ArrayCollection($trace);
    }

    /**
     * Get the 'class' key of the last entry of the Exception stack
     * trace array
     *
     * @return string
     */
    public function getClassNameFromLastStack(): string
    {
        $trace = $this->collection->first();

        return $trace->get('class') ?? '';
    }

    /**
     * Get the 'function' key of the last entry of the Exception stack
     * trace array
     *
     * @return string
     */
    public function getMethodNameFromLastStack(): string
    {
        $trace = $this->collection->first();

        return $trace->get('function') ?? '';
    }

    /**
     * Get the 'args' key of the last entry of the Exception stack
     * trace array
     *
     * @return array
     */
    public function getArgsFromLastStack(): array
    {
        $trace = $this->collection->first();

        return $trace->get('args') ?? [];
    }

    /**
     * Get the last entry of the Exception stack trace array.
     *
     * @return array
     */
    public function getLastStackTrace(): array
    {
        $last = $this->collection->first();

        return $last ? $last->toArray() : [];
    }
}
