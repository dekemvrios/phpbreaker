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
        throw new TException('index', 'teste', 'Teste de aplicacao de exception', 500);
    }

}
