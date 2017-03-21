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

    // add trace in debug information
    $ex->getDebug()->addEntry(
            'trace', $ex->getThinTrace(['file', 'line']) //'function', 'class', 'type', 'args']
    );

    echo $ex->toJson();
}