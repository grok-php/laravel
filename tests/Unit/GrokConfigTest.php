<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use GrokPHP\Client\Config\GrokConfig;
use GrokPHP\Client\Enums\DefaultConfig;

class GrokConfigTest extends TestCase
{
    public function test_it_uses_default_values_when_not_overridden()
    {
        $config = new GrokConfig(apiKey: 'test-api-key');

        $this->assertEquals('test-api-key', $config->apiKey);
        $this->assertEquals(DefaultConfig::BASE_URI->value, $config->baseUri);
        $this->assertEquals((int) DefaultConfig::TIMEOUT->value, $config->timeout);
    }

    public function test_it_allows_custom_values()
    {
        $customBaseUri = 'https://custom-api.grok.dev';

        $config = new GrokConfig(
            apiKey: 'test-api-key',
            baseUri: $customBaseUri,
        );

        $this->assertEquals('test-api-key', $config->apiKey);
        $this->assertEquals($customBaseUri, $config->baseUri);
    }
}
