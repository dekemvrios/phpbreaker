# Changelog

Todas as modificações relevantes para phpbreaker serão documentadas neste arquivo

O formato é baseado [Keep a CHANGELOG](http://keepachangelog.com/) e esse projeto adere ao [Semantic Versioning 2.0.0](http://semver.org/).  

## [0.2.0] - 2017-07-27

### Added
- Implementado método mágico __call na classe TInfo de modo a permitir a chamada e atribuição dinâmica de entradas presentes na propriedade info.

Considerando a implementação default da classe TException, que possui a propriedade info com a entrada 'message':

```
// implementação a partir do release 0.2.0

$exception->getError()->getMessage();
$exception->getError()->setMessage('random message');

$exception->getError()->setAny('any value');
$exception->getError()->getAny();

// implemantação até versão 0.1.0

$exception->getError()->getEntry('message');
$exception->getError()->setEntry('message', 'random message');

$exception->getError()->setEntry('any', 'any value');
$exception->getError()->getEntry('any');

```

## [0.1.0] - 2017-07-19

### Added
- Adicionado suporte para integração com Travis CI.
- Adicionado suporte para testes com PHPUnit.

## [0.0.2] - 2017-07-09

### Fixed
- Corrigido estrutura de diretórios de forma a permitir extensão da biblioteca.

## [0.0.1] - 2017-05-05

### Added
- Publicado codigo fonte no packagist.
