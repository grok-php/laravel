<?php

namespace Tests;

use GrokPHP\Laravel\Facades\GrokAI;
use GrokPHP\Laravel\Providers\GrokServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

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
}
