<?php

namespace ETA\LaravelQueryWatcher;

use Illuminate\Support\ServiceProvider;

class QueryWatcherServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/query-watcher.php',
            'query-watcher'
        );

        $this->app->singleton(QueryWatcher::class, function ($app) {
            return new QueryWatcher();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish config file
        $this->publishes([
            __DIR__ . '/../config/query-watcher.php' => Compatibility::configPath('query-watcher.php'),
        ], 'query-watcher-config');

        // Start the query watcher
        if (!Compatibility::runningUnitTests()) {
            $this->app->make(QueryWatcher::class)->start();
        }
    }
}
