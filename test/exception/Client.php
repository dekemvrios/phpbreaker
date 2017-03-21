<?php

use Solis\Breaker\TException;

class Client
{

    public function __construct($name)
    {
        $this->setName($name);
    }

    public function setName($name)
    {
        throw new TException(__CLASS__, __METHOD__, 'Teste de aplicacao de exception', 500);
    }

}
