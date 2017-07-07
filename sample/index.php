<?php

require_once '../vendor/autoload.php';

use \Solis\Breaker\TException;

try {

    class Client
    {

        public function __construct()
        {
            throw new TException(
                __CLASS__,
                __METHOD__,
                'TException class sample',
                500
            );
        }

    }

    $client = new Client();
} catch (TException $ex) {
    //echo $ex->toJson();

    $ex->getError()->setEntry('message', uniqid(rand(), true));
    $ex->getError()->addEntry('date', Date('Y-m-d H:i:s'));
    $ex->getError()->removeEntry('code');
    echo $ex->getError()->toJson();

    $ex->getDebug()->removeEntry('trace');
    //echo $ex->getDebug()->toJson();

}