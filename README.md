# README

[![Latest Stable Version](https://poser.pugx.org/solis/phpbreaker/v/stable)](https://packagist.org/packages/solis/phpbreaker)
[![Build Status](https://travis-ci.org/rafaelbeecker/phpbreaker.svg?branch=master)](https://travis-ci.org/rafaelbeecker/phpbreaker)
[![License](https://poser.pugx.org/solis/phpbreaker/license)](https://packagist.org/packages/solis/phpbreaker)

## Breaker

Breaker extende o mecanismo \Exception nativo da linguagem, organizando a informação e permitindo definir como essa será retornada.  

## Requirements
* php >=5.6

## Como instalar?

Esse pacote foi estruturado para ser instalado por meio do composer

```
composer require solis/phpbreaker
``` 

## Como utilizar?

Instancie a classe TException no momento em que for necessário lançar um novo erro

```
use Solis\Breaker\TException

try {

  // Lots of code here

  // I have a bad feeling about this
  
  // More code here
  
  // Something wrong happened! noooo!
    
  throw new TException(__CLASS__, __METHOD__, 'something really bad', 500);

catch (TException $ex) {

  // I catch you here
  echo $ex->getError()->toJson();        
  
  // get the $debug representation as json
  // $ex->getDebug()->toJson();
  
  // get the full TException representation as json
  // $ex->toJson();
}
```

## Testes

```
$ composer test
```

## Licença

The MIT License (MIT). Verifique [LICENSE](LICENSE.MD) para mais informações.


