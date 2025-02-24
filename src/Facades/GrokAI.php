<?php

namespace GrokPHP\Laravel\Facades;

use GrokPHP\Client\Clients\Vision;
use Illuminate\Support\Facades\Facade;

/**
 * @method static array chat(array $messages, ?\GrokPHP\Client\Config\ChatOptions $options = null)
 * @method static Vision vision()
 */
class GrokAI extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \GrokPHP\Laravel\Services\GrokAI::class;
    }
}
