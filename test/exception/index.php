<?php

require_once '../../vendor/autoload.php';

use \Solis\Breaker\TException;

try {
    require_once 'Client.php';

    $client = new Client('Client');
} catch (TException $ex) {

    // add trace in debug information
    $ex->getDebug()->addInfoEntry(
            'trace', $ex->getThinTrace(['file', 'line']) //'function', 'class', 'type', 'args']
    );

    echo json_encode([
        'error' => $ex->getError()->getInfo(),
        'debug' => $ex->getDebug()->getInfo(),
    ]);
}