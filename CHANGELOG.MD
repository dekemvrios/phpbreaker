# Changelog

Todas as modificações relevantes para phpbreaker serão documentadas neste arquivo

O formato é baseado [Keep a CHANGELOG](http://keepachangelog.com/) e esse projeto adere ao [Semantic Versioning 2.0.0](http://semver.org/).  

## 2.0.0 - 2017-09-15

## Added
- Incluído classe RuntimeException como derivada de PHP SPL RuntimeException.
- Incluída AbstractDataContainer contendo os métodos de detalhamento migradas de Tinfo.
- Incluída FriendlyExceptionTrait responsável construir o objeto AbstractDataContainer.

## Removed
- Removido classes de domínio TException e TInfo.

## 1.0.0 - 2017-08-05

### Added
- Publicado package considerando versão estável.
