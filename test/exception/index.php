<?php

require_once '../../vendor/autoload.php';

use \Solis\Breaker\TException;

try {

    class Client
    {

        public function __construct()
        {
            throw new TException(__CLASS__, __METHOD__, 'TException class test', 500);
        }

    }

    $client = new Client();
} catch (TException $ex) {

    echo $ex->toJson();

    //echo $ex->getDebug()->toJson();
    //echo $ex->getError()->toJson();   
}