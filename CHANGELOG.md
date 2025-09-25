# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [5.1.6] - 2024-12-19

### Added
- CSS compilation support in webpack.mix.js
- CSS stylesheet registration in service provider
- Added resources/css/ directory with ckeditor.css

### Changed
- Updated CKEditor from 4.16.2 to 4.22.1 (last free version)
- Updated CDN URL to use CKEditor 4.22.1
- Updated package.json dependency to ckeditor4 ^4.22.1

### Note
- CKEditor 4.22.1 is the last free version. All subsequent versions (4.23+) are LTS versions that require a commercial license purchase.

## [5.1.3] - 2024-11-13

### Fixed
- Fixed compatibility with `Orchid\Screen\Field::make`

## [5.1.2] - 2023-08-10

### Fixed
- Fixed data saving in source editing mode when switching to editor mode doesn't occur
- Updated compiled assets

## [5.1.1] - 2023-08-10

### Fixed
- Fixed CSRF token passing in request headers
- Updated dependencies and compiled assets

## [5.1.0] - 2023-06-18

### Added
- Ability to pass custom options for specific editor instance
- `setOptions()` method for setting editor options
- `mergeOptions()` method for merging with existing options
- Updated Blade template to support passing options through Stimulus

### Changed
- Updated `composer.json` with new dependencies

## [5.0.0] - 2023-05-28

### Changed
- **BREAKING**: Updated Laravel Orchid support to version ^14.0
- Updated dependencies in `composer.json`

### Removed
- Support for Laravel Orchid versions below 14.0

## [4.0.0] - 2023-02-23

### Changed
- **BREAKING**: Updated Laravel Orchid support to version ^13.0
- Updated dependencies in `composer.json`

### Removed
- Support for Laravel Orchid versions below 13.0

## [3.0.0] - 2023-02-19

### Changed
- **BREAKING**: Updated Laravel Orchid support to version ^12.0
- Updated dependencies in `composer.json`

### Removed
- Support for Laravel Orchid versions below 12.0

## [2.0.2] - 2022-XX-XX

### Fixed
- Various fixes and improvements

## [2.0.1] - 2022-XX-XX

### Changed
- Updated Laravel Orchid v11 support

## [1.0.1] - 2022-XX-XX

### Fixed
- Fixed resource registration

## [1.0.0] - 2022-XX-XX

### Added
- Minor update to editor loading and functionality
- Improved CKEditor integration

### Known Issues
- Maximize issue not resolved, when using the editor, page transitions with the editor should be done without turbo-link, i.e. `rawClick()`

## [0.0.4] - 2022-XX-XX

### Fixed
- Fixed JavaScript, added editor instance cleanup when DOM is no longer available

## [0.0.3] - 2022-XX-XX

### Added
- Ability to publish configuration
- Ability to specify editor location through config

## [0.0.2] - 2022-XX-XX

### Fixed
- Fixed value and escape handling

## [0.0.1] - 2022-XX-XX

### Added
- Initial release
- Textarea field with CKEditor for Orchid Platform
- Basic Laravel Orchid integration

---

## Legend

- **Added** - for new features
- **Changed** - for changes in existing functionality
- **Deprecated** - for soon-to-be removed features
- **Removed** - for removed features
- **Fixed** - for bug fixes
- **Security** - for vulnerability fixes

---

## Русская Документация

- [README на русском](README.ru.md)
- [Changelog на русском](CHANGELOG.ru.md)
