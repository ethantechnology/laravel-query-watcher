# Changelog

All notable changes to `laravel-query-watcher` will be documented in this file.

## [1.3.0] - 2024-11-26

### Changed
- **BREAKING**: Changed `enabled` default value from `true` to `false`
- Package is now completely opt-in by default to prevent unexpected performance impact
- Users need to explicitly set `QUERY_WATCHER_ENABLED=true` to enable the query watcher
- This allows users to enable monitoring only when needed (e.g., in local/development environments)

## [1.2.0] - 2024-11-26

### Changed
- **BREAKING**: Changed `slow_query_enabled` default value from `true` to `false`
- Slow query detection is now opt-in by default to reduce performance overhead
- Users need to explicitly set `QUERY_WATCHER_SLOW_QUERY_ENABLED=true` to enable slow query detection

## [1.1.0] - 2024-11-26

### Added
- New configuration option `slow_query_enabled` to enable/disable slow query detection independently
- New method `shouldDetectSlowQueries()` to check if slow query detection is enabled
- Environment variable `QUERY_WATCHER_SLOW_QUERY_ENABLED` for easier configuration

### Changed
- Slow query detection can now be disabled while keeping query count monitoring active

## [1.0.0] - 2024-11-26

### Added
- Initial stable release
- Query count monitoring with configurable threshold
- Slow query detection with execution time tracking
- Flexible logging with custom log levels and channels
- Path and command exclusion support with wildcards
- Environment-specific enabling
- Optional query details logging (SQL and bindings)
- Comprehensive configuration options
- Compatibility helper class for supporting older Laravel versions

### Features
- Support for Laravel 5.8, 6.x, 7.x, 8.x, 9.x, 10.x, and 11.x
- Support for PHP 7.2, 7.3, 7.4, 8.0, 8.1, 8.2, and 8.3
- Publishable configuration file
- Auto-discovery support for Laravel 5.5+
- Backward compatible with legacy Laravel projects
