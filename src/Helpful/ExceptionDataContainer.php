<?php

namespace Solis\Breaker\Helpful;

/**
 * Class ExceptionDataContainer
 *
 * @package Solis\Breaker\Helpful
 */
class ExceptionDataContainer extends AbstractDataContainer
{

    public static function make(
        array $info = []
    ): AbstractDataContainer {
        return new static($info);
    }
}
