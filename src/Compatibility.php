<?php

namespace YourVendor\LaravelQueryWatcher;

/**
 * Compatibility helper for different Laravel versions
 */
class Compatibility
{
    /**
     * Get the config path helper
     * 
     * @param string $path
     * @return string
     */
    public static function configPath($path = '')
    {
        // Laravel 5.x and newer
        if (function_exists('config_path')) {
            return config_path($path);
        }

        // Fallback for very old versions
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }

    /**
     * Check if running in console
     *
     * @return bool
     */
    public static function runningInConsole()
    {
        if (method_exists(app(), 'runningInConsole')) {
            return app()->runningInConsole();
        }

        // Fallback
        return php_sapi_name() === 'cli' || php_sapi_name() === 'phpdbg';
    }

    /**
     * Check if running unit tests
     *
     * @return bool
     */
    public static function runningUnitTests()
    {
        if (method_exists(app(), 'runningUnitTests')) {
            return app()->runningUnitTests();
        }

        // Fallback
        return app()->environment() === 'testing';
    }

    /**
     * Get request path in a compatible way
     *
     * @return string
     */
    public static function requestPath()
    {
        if (function_exists('request')) {
            return request()->path();
        }

        // Fallback using app
        return app('request')->path();
    }
}
