<?php

namespace Tests\Feature;

use GrokPHP\Laravel\Services\GrokAI;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class GrokServiceProviderTest extends TestCase
{
    public function test_it_registers_grok_a_i_in_the_service_container()
    {
        $grokAI = App::make(GrokAI::class);

        $this->assertInstanceOf(GrokAI::class, $grokAI);
    }
}
