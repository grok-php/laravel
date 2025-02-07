<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use GrokPHP\Laravel\Providers\GrokServiceProvider;
use GrokPHP\Laravel\Facades\GrokAI;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [GrokServiceProvider::class];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'GrokAI' => GrokAI::class,
        ];
    }

    protected function defineEnvironment($app)
    {
        $app['config']->set('grok.api_key', 'test-api-key');
    }
}
