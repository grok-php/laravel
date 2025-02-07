<?php

namespace GrokPHP\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array chat(array $messages, \GrokPHP\Client\Config\ChatOptions $options)
 */
class GrokAI extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'grok-ai';
    }
}
