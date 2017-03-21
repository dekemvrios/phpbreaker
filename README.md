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

$error and $debug objects are instances of \Solis\Breaker\TInfo class. Their structure allows to add or remove information to it as needed.

```
$ex->getError()->addEntry('help', 'contact suport');

$ex->getDebug()->addEntry('application', 'app test class');

$ex->getError()->removeEntry('message');

$ex->getDebug()->removeEntry('class');
```
