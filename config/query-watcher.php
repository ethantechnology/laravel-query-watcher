<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable Query Watcher
    |--------------------------------------------------------------------------
    |
    | This option controls whether the query watcher is enabled.
    | Set to true to enable query monitoring.
    |
    */
    'enabled' => env('QUERY_WATCHER_ENABLED', false),

    /*
    |--------------------------------------------------------------------------
    | Enable Slow Query Detection
    |--------------------------------------------------------------------------
    |
    | This option controls whether slow query detection is enabled.
    | Set to false to disable slow query monitoring while keeping query count monitoring active.
    |
    */
    'slow_query_enabled' => env('QUERY_WATCHER_SLOW_QUERY_ENABLED', false),

    /*
    |--------------------------------------------------------------------------
    | Enable Slow Query Detection for Console Commands
    |--------------------------------------------------------------------------
    |
    | This option controls whether slow query detection is enabled for Artisan
    | commands. Set to false to disable slow query monitoring in console while
    | keeping it active for web requests.
    |
    */
    'slow_query_console_enabled' => env('QUERY_WATCHER_SLOW_QUERY_CONSOLE_ENABLED', false),

    /*
    |--------------------------------------------------------------------------
    | Query Count Threshold
    |--------------------------------------------------------------------------
    |
    | The maximum number of queries allowed before a warning is logged.
    | Adjust this based on your application's normal query patterns.
    |
    */
    'threshold' => env('QUERY_WATCHER_THRESHOLD', 50),

    /*
    |--------------------------------------------------------------------------
    | Log Level
    |--------------------------------------------------------------------------
    |
    | The log level to use when logging query warnings.
    | Options: 'emergency', 'alert', 'critical', 'error', 'warning', 'notice', 'info', 'debug'
    |
    */
    'log_level' => env('QUERY_WATCHER_LOG_LEVEL', 'warning'),

    /*
    |--------------------------------------------------------------------------
    | Log Channel
    |--------------------------------------------------------------------------
    |
    | The log channel to use for query warnings.
    | Set to null to use the default log channel.
    |
    */
    'log_channel' => env('QUERY_WATCHER_LOG_CHANNEL', null),

    /*
    |--------------------------------------------------------------------------
    | Slow Query Threshold (milliseconds)
    |--------------------------------------------------------------------------
    |
    | Log individual queries that exceed this execution time for web requests.
    | Set to null or 0 to disable slow query logging.
    |
    */
    'slow_query_threshold' => env('QUERY_WATCHER_SLOW_QUERY_THRESHOLD', 1000),

    /*
    |--------------------------------------------------------------------------
    | Slow Query Console Threshold (milliseconds)
    |--------------------------------------------------------------------------
    |
    | Log individual queries that exceed this execution time for Artisan commands.
    | Console commands typically have longer-running queries, so this threshold
    | is higher by default. Set to null or 0 to disable slow query logging.
    |
    */
    'slow_query_console_threshold' => env('QUERY_WATCHER_SLOW_QUERY_CONSOLE_THRESHOLD', 3000),

    /*
    |--------------------------------------------------------------------------
    | Log Query Details
    |--------------------------------------------------------------------------
    |
    | When enabled, logs will include query SQL and bindings.
    | Warning: This may expose sensitive data in logs.
    |
    */
    'log_query_details' => env('QUERY_WATCHER_LOG_DETAILS', false),

    /*
    |--------------------------------------------------------------------------
    | Excluded Paths
    |--------------------------------------------------------------------------
    |
    | Paths to exclude from query monitoring.
    | Supports wildcards (e.g., 'admin/*', 'api/webhooks/*')
    |
    */
    'excluded_paths' => [
        // 'admin/*',
        // '_debugbar/*',
    ],

    /*
    |--------------------------------------------------------------------------
    | Excluded Commands
    |--------------------------------------------------------------------------
    |
    | Artisan commands to exclude from query monitoring.
    |
    */
    'excluded_commands' => [
        // 'migrate',
        // 'db:seed',
    ],

];
