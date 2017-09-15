<?php

namespace Solis\Breaker\Exceptions;

use RuntimeException as StandardRuntimeException;

/**
 * Class RuntimeException
 *
 * @package Solis\Breaker\Exceptions
 */
final class RuntimeException extends StandardRuntimeException implements RuntimeExceptionInterface
{

    use FriendlyExceptionTrait;

    public function __construct(
        $reason,
        $code = 500
    ) {
        $this->setErrorDebugInformation($reason, $code, $this->getTrace());

        parent::__construct($this->getError()->toJson(), $this->getErrorCode());
    }
}
