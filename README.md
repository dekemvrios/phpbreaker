# Solis Exceptions Component

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/247bb7a28b9b4fc6811b57f6571ae23a)](https://www.codacy.com/app/rafaelbeecker/phpbreaker?utm_source=github.com&utm_medium=referral&utm_content=rafaelbeecker/phpbreaker&utm_campaign=badger)
[![Codacy Badge](https://api.codacy.com/project/badge/Coverage/247bb7a28b9b4fc6811b57f6571ae23a)](https://www.codacy.com/app/rafaelbeecker/phpbreaker?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=rafaelbeecker/phpbreaker&amp;utm_campaign=Badge_Coverage)
[![Latest Stable Version](https://poser.pugx.org/solis/phpbreaker/v/stable)](https://packagist.org/packages/solis/phpbreaker)
[![License](https://poser.pugx.org/solis/phpbreaker/license)](https://packagist.org/packages/solis/phpbreaker)
[![Build Status](https://travis-ci.org/rafaelbeecker/phpbreaker.svg?branch=master)](https://travis-ci.org/rafaelbeecker/phpbreaker)

This package contains a set of exceptions shared across Solis components.

## Install

The best way to use this component is through Composer

```
composer require solis/phpbreaker
```

## Usage

The simplest usage is to thrown a implementation of Solis\Breaker\ExceptionInterface.

``` php

    use Solis\Breaker\ExceptionInterface;
    use Solis\Exceptions\RuntimeException;

    try {
        thrown new RuntimeException('something bad here', 500);          
    } catch (ExceptionInterface $e){
        echo $e->getMessage();
        
        // you can get a representation of the exception as array, containing an error and a debug entry
        // $e->toArray();
        
        // same representation as before but in json format
        // $e->toJson();
        
        // get only the error entry as json representation
        // $e->getErrorAsJson();
        
        // get only the debug entry as json representation
        // $e->getDebugAsJson();
                       
        // its possible to set custom data to the error entry of the exception                                
        // $e->getError()->setEntry($entry, $data);
        
        // the same for the debug entry
        // $e->getDebug()->setEntry($entry, $data);                                      
    }    
```

All exceptions implemented in this package extends one of the SPL Exceptions. So its possible to catch normally 
with catch \Exception.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.
 
## Testing

```bash
$ composer test
```

## Contributing

All feedback / bug reports / pull requests are welcome.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
