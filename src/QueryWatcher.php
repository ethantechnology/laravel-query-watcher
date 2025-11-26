<?php

namespace ETA\LaravelQueryWatcher;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use ETA\LaravelQueryWatcher\Compatibility;

class QueryWatcher
{
    /**
     * @var int
     */
    protected $queryCount = 0;

    /**
     * @var array
     */
    protected $slowQueries = [];

    /**
     * @var string|null
     */
    protected $currentPath = null;

    /**
     * Start watching database queries
     *
     * @return void
     */
    public function start()
    {
        if (!$this->shouldWatch()) {
            return;
        }

        $this->currentPath = $this->getCurrentPath();

        if ($this->isExcluded($this->currentPath)) {
            return;
        }

        $this->registerQueryListener();
        $this->registerTerminatingCallback();
    }

    /**
     * Determine if query watching should be enabled
     * 
     * @return bool
     */
    protected function shouldWatch()
    {
        return config('query-watcher.enabled', true);
    }

    /**
     * Determine if slow query detection should be enabled
     * 
     * @return bool
     */
    protected function shouldDetectSlowQueries()
    {
        return config('query-watcher.slow_query_enabled', false);
    }

    /**
     * Get the current request path or artisan command name
     *
     * @return string
     */
    protected function getCurrentPath()
    {
        if (Compatibility::runningInConsole()) {
            $command = isset($_SERVER['argv'][1]) ? $_SERVER['argv'][1] : 'unknown';
            return 'artisan ' . $command;
        }

        return Compatibility::requestPath();
    }

    /**
     * Check if the current path is excluded
     * 
     * @param string $path
     * @return bool
     */
    protected function isExcluded($path)
    {
        if (Compatibility::runningInConsole()) {
            $command = str_replace('artisan ', '', $path);
            $excludedCommands = config('query-watcher.excluded_commands', []);

            foreach ($excludedCommands as $excluded) {
                if ($command === $excluded || Str::is($excluded, $command)) {
                    return true;
                }
            }
        } else {
            $excludedPaths = config('query-watcher.excluded_paths', []);

            foreach ($excludedPaths as $excluded) {
                if (Str::is($excluded, $path)) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Register the database query listener
     *
     * @return void
     */
    protected function registerQueryListener()
    {
        DB::listen(function ($query) {
            $this->queryCount++;

            // Check if slow query detection is enabled
            if (!$this->shouldDetectSlowQueries()) {
                return;
            }

            $slowQueryThreshold = config('query-watcher.slow_query_threshold', 0);

            if ($slowQueryThreshold > 0 && $query->time >= $slowQueryThreshold) {
                $this->slowQueries[] = [
                    'sql' => $query->sql,
                    'bindings' => $query->bindings,
                    'time' => $query->time,
                ];

                $this->logSlowQuery($query);
            }
        });
    }

    /**
     * Register the terminating callback to log query statistics
     *
     * @return void
     */
    protected function registerTerminatingCallback()
    {
        app()->terminating(function () {
            $threshold = config('query-watcher.threshold', 50);

            if ($this->queryCount > $threshold) {
                $this->logHighQueryCount();
            }
        });
    }

    /**
     * Log a slow query
     *
     * @param mixed $query
     * @return void
     */
    protected function logSlowQuery($query)
    {
        $logLevel = config('query-watcher.log_level', 'warning');
        $logDetails = config('query-watcher.log_query_details', false);

        $message = sprintf(
            '[QueryWatcher] Slow query detected on `%s`: %.2fms',
            $this->currentPath,
            $query->time
        );

        $context = [
            'path' => $this->currentPath,
            'execution_time_ms' => $query->time,
        ];

        if ($logDetails) {
            $context['sql'] = $query->sql;
            $context['bindings'] = $query->bindings;
        }

        $this->log($logLevel, $message, $context);
    }

    /**
     * Log high query count
     *
     * @return void
     */
    protected function logHighQueryCount()
    {
        $logLevel = config('query-watcher.log_level', 'warning');
        $threshold = config('query-watcher.threshold', 50);

        $message = sprintf(
            '[QueryWatcher] High number of DB queries detected on `%s`: %d queries (threshold: %d)',
            $this->currentPath,
            $this->queryCount,
            $threshold
        );

        $context = [
            'path' => $this->currentPath,
            'query_count' => $this->queryCount,
            'threshold' => $threshold,
            'slow_queries_count' => count($this->slowQueries),
        ];

        if (config('query-watcher.log_query_details', false) && !empty($this->slowQueries)) {
            $context['slow_queries'] = $this->slowQueries;
        }

        $this->log($logLevel, $message, $context);
    }

    /**
     * Log a message using the configured channel and level
     *
     * @param string $level
     * @param string $message
     * @param array $context
     * @return void
     */
    protected function log($level, $message, array $context = [])
    {
        $channel = config('query-watcher.log_channel');

        $logger = $channel ? Log::channel($channel) : Log::getFacadeRoot();

        $logger->log($level, $message, $context);
    }

    /**
     * Get the current query count
     * 
     * @return int
     */
    public function getQueryCount()
    {
        return $this->queryCount;
    }

    /**
     * Get the slow queries
     * 
     * @return array
     */
    public function getSlowQueries()
    {
        return $this->slowQueries;
    }
}
