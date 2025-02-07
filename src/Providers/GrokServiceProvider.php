<?php

namespace GrokPHP\Laravel\Providers;

use Illuminate\Support\ServiceProvider;
use GrokPHP\Client\Clients\GrokClient;
use GrokPHP\Client\Config\GrokConfig;
use GrokPHP\Client\Enums\DefaultConfig;

class GrokServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/grok.php', 'grok');

        $this->app->singleton(GrokConfig::class, function () {
            return new GrokConfig(
                apiKey: config('grok.api_key'),
                baseUri: config('grok.base_uri', DefaultConfig::BASE_URI->value),
                timeout: (int) config('grok.timeout', (int) DefaultConfig::TIMEOUT->value),
            );
        });

        $this->app->singleton(GrokClient::class, function ($app) {
            return new GrokClient($app->make(GrokConfig::class));
        });

        $this->app->alias(GrokClient::class, 'grok-ai');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                \GrokPHP\Laravel\Commands\InstallGrokCommand::class,
            ]);

            $this->publishes([
                __DIR__ . '/../Config/grok.php' => config_path('grok.php'),
            ], 'config');
        }
    }
}
