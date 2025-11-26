<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable Query Watcher
    |--------------------------------------------------------------------------
    |
    | This option controls whether the query watcher is enabled.
    | Set to false to disable query monitoring entirely.
    |
    */
    'enabled' => env('QUERY_WATCHER_ENABLED', true),

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
    | Log individual queries that exceed this execution time.
    | Set to null or 0 to disable slow query logging.
    |
    */
    'slow_query_threshold' => env('QUERY_WATCHER_SLOW_QUERY_THRESHOLD', 1000),

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
