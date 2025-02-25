<?php

namespace GrokPHP\Laravel\Providers;

use GrokPHP\Client\Clients\GrokClient;
use GrokPHP\Client\Config\GrokConfig;
use GrokPHP\Client\Enums\DefaultConfig;
use GrokPHP\Laravel\Commands\InstallGrokCommand;
use GrokPHP\Laravel\Services\GrokAI;
use Illuminate\Support\ServiceProvider;

class GrokServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../../config/grok.php', 'grok');

        $this->app->singleton(GrokConfig::class, function () {
            return new GrokConfig(
                apiKey: config('grok.api_key'),
                baseUri: config('grok.base_uri', DefaultConfig::BASE_URI->value),
                timeout: (int) config('grok.timeout', (int) DefaultConfig::TIMEOUT->value),
            );
        });

        $this->app->singleton(GrokClient::class, fn ($app) => new GrokClient($app->make(GrokConfig::class)));

        $this->app->singleton(GrokAI::class, fn ($app) => new GrokAI($app->make(GrokClient::class)));

        $this->app->alias(GrokAI::class, 'grok-ai');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallGrokCommand::class,
            ]);

            $this->publishes([
                __DIR__.'/../../config/grok.php' => config_path('grok.php'),
            ], 'grok-config');
        }
    }
}
