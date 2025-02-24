<?php

namespace Tests\Feature;

use Tests\TestCase;
use GrokPHP\Laravel\Services\GrokAI;
use Illuminate\Support\Facades\App;

class GrokServiceProviderTest extends TestCase
{
    public function test_it_registers_GrokAI_in_the_service_container()
    {
        $grokAI = App::make(GrokAI::class);

        $this->assertInstanceOf(GrokAI::class, $grokAI);
    }
}
