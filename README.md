# README
[![Code Climate](https://codeclimate.com/github/realfabecker/breaker/badges/gpa.svg)](https://codeclimate.com/github/realfabecker/breaker)

## What is Breaker
Breaker package contains the TException class which extends the default php \Exception class. It organizes the information in throwed exceptions allowing to define how the information will be displayed.

## Requirements
* php >=5.6

## How To Install?
This package was designed to be installed with composer dependency management tool.
```
composer require solis/breaker
``` 

## How To Use it?
Require it with composer and thrown a new TException
```
use Solis\Breaker\TException

try {

  throw new TException($class, $method, $reason, $code);

catch (TException $ex) {
  echo $ex->toJson();
}
```

## How This Works
TException extends the \Exception class and separates the exception information in two objects

* $error - stores the $code and $reason especified in TException constructor
* $debug - stores the $class and $method especified in TException constructor

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
