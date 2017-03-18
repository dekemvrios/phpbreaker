# README
[![Code Climate](https://codeclimate.com/github/realfabecker/breaker/badges/gpa.svg)](https://codeclimate.com/github/realfabecker/breaker)

## What is Breaker
Breaker package contains the TException class which extends the default php \Exception class. It adds more information to throwed exceptions and allows to choose what part of the information error will be returned.

## Requirements
* php >=5.6

## How To Install?
This package was designed to be installed with composer dependency management tool.
```
composer require solis/breaker
``` 

## How This Works
\Solis\Breaker\TException extends the \Exception class and separates the exception information in two objects
* $aInfoError - contains the information that will be returned by default
* $aInfoDebug - contains the information that will be returned if the debug mode of the class is activated

By default, it returns a associative array, but is possible to set the default return format to json.

```
{
  "erro": {
    "status": 400,
    "mensagem": "Teste de aplicacao de exception"
  },
  "debug": {
    "classe": "index",
    "metodo": "teste"
  }
}
```
