# Changelog

Todas as modificações relevantes para phpbreaker serão documentadas neste arquivo

O formato é baseado [Keep a CHANGELOG](http://keepachangelog.com/) e esse projeto adere ao [Semantic Versioning 2.0.0](http://semver.org/).  

## 2.0.0 - 2017-09-20

## Added
- Incluído classe RuntimeException como derivada de \RuntimeException.
- Incluída AbstractDataContainer contendo os métodos de detalhamento migradas de Tinfo.
- Incluída ExceptionTrait contendo métodos de atribuição e acesso ao detalhamento da exception.
- Incluído caso de teste para validação funcionamento de RuntimeException.

## Removed
- Removido classes de domínio TException e TInfo por intuido de refatoração do projeto.

## 1.0.0 - 2017-08-05

### Added
- Publicado package considerando versão estável.
