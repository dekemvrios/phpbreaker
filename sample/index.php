<?php

require_once '../vendor/autoload.php';

use Solis\Breaker\Exceptions\RuntimeExceptionInterface;
use Solis\Breaker\Exceptions\RuntimeException;

try {

    throw new RuntimeException('mnessage');
} catch (RuntimeExceptionInterface $e) {
    echo $e->toJson();
}
