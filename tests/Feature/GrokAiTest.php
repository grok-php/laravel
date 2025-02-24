<?php

namespace Tests\Feature;

use GrokPHP\Laravel\Facades\GrokAI;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use GrokPHP\Client\Exceptions\GrokException;

class GrokAiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test basic chat request.
     */
    public function test_it_can_send_a_chat_request(): void
    {
        $response = GrokAI::chat([
            ['role' => 'user', 'content' => 'Tell me a joke!']
        ])->full();

        $this->assertArrayHasKey('choices', $response);
        $this->assertNotEmpty($response['choices']);
        $this->assertEquals('assistant', $response['choices'][0]['message']['role']);
    }

    /**
     * Test getting only the AI content.
     */
    public function test_it_returns_only_ai_response(): void
    {
        $content = GrokAI::chat([
            ['role' => 'user', 'content' => 'Tell me a joke!']
        ])->content();

        $this->assertIsString($content);
        $this->assertNotEmpty($content);
    }

    /**
     * Test image analysis using Vision.
     */
    public function test_it_can_analyze_an_image(): void
    {
        $response = GrokAI::vision()->analyze(
            'https://www.shutterstock.com/image-photo/young-english-cocker-spaniel-puppy-600nw-2026045151.jpg',
            'Describe this image'
        )->full();

        $this->assertArrayHasKey('choices', $response);
        $this->assertNotEmpty($response['choices']);
        $this->assertEquals('assistant', $response['choices'][0]['message']['role']);
    }

    /**
     * Test exception handling when using an empty API key.
     */
    public function test_it_throws_exception_for_empty_api_key(): void
    {
        config(['grok.api_key' => '']);

        $this->expectException(GrokException::class);
        $this->expectExceptionMessage('No API key provided');

        GrokAI::chat([
            ['role' => 'user', 'content' => 'Tell me a joke!']
        ]);
    }

    /**
     * Test exception handling when using an invalid API key.
     * @return void
     */
    public function test_it_throws_exception_for_invalid_api_key(): void
    {
        config(['grok.api_key' => 'invalid-key']);

        $this->expectException(GrokException::class);
        $this->expectExceptionMessageMatches('/Incorrect API key/');

        GrokAI::chat([
            ['role' => 'user', 'content' => 'Tell me a joke!']
        ]);
    }

    /**
     * Test exception when using an unsupported model with image input.
     */
    public function test_it_throws_exception_for_invalid_model_with_image(): void
    {
        $this->expectException(GrokException::class);
        $this->expectExceptionMessage('The model does not support image input but some images are present in the request.');

        GrokAI::vision()->analyze(
            'https://www.shutterstock.com/image-photo/young-english-cocker-spaniel-puppy-600nw-2026045151.jpg',
            'What is in this image?',
            model: \GrokPHP\Client\Enums\Model::GROK_2
        );
    }
}
