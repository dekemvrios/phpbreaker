<?php

require_once '../../vendor/autoload.php';

use \Solis\Breaker\TException;

try {

    throw new TException('index', 'teste', 'Teste de aplicacao de exception', TException::ERR_BAD_REQUEST);
} catch (TException $ex) {
    header('Content-type:application/json');

    $ex->setReturnAsJson(true);

    echo $ex->getExceptionInfo();
}

