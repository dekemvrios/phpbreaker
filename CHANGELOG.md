# Changelog

All Notable changes to phpbreaker will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.  

## 2.0.2 - 2017-09-21

## Changed
- Translated library documentation from portuguese to english.

## 2.0.1 - 2017-09-21

## Added
- Added unit test to validate StackInfo class.
- Added 'solis-foundation' as package dependency to create error and debug entries in ExceptionTrait.

## Removed
- Removed unused classes contained in 'Helpful' namespace.

## 2.0.0 - 2017-09-20

## Added
- Moved TInfo's methods to a new class AbstractDataContainer.
- Added ExceptionTrait to easily shared methods between exception derived classes.
- Added unit test to validate RuntimeException class.
- Added RuntimeException derived from \RuntimeException.

## Removed
- Refactored 'exceptions component' removing TException and TInfo classes.

## 1.0.0 - 2017-08-05

### Added
- Package initial stable release.
