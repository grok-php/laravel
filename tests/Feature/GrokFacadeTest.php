<?php

namespace Tests\Feature;

use GrokPHP\Laravel\Services\GrokAI;
use Tests\TestCase;

class GrokFacadeTest extends TestCase
{
    public function test_facade_resolves_correctly()
    {
        $this->assertInstanceOf(GrokAI::class, app('grok-ai'));
    }
}
