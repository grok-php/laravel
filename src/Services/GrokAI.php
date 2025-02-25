<?php

namespace GrokPHP\Laravel\Services;

use GrokPHP\Client\Clients\GrokClient;
use GrokPHP\Client\Config\ChatOptions;
use GrokPHP\Client\Enums\Model;
use GrokPHP\Client\Exceptions\GrokException;
use GrokPHP\Laravel\Support\GrokResponse;

class GrokAI
{
    protected GrokClient $client;

    public function __construct(GrokClient $client)
    {
        $this->client = $client;
    }

    /**
     * Send a chat completion request to Grok API.
     *
     * @throws GrokException
     */
    public function chat(array $messages, ?ChatOptions $options = null): GrokResponse
    {
        $options = $options ?? new ChatOptions(
            model: Model::GROK_2,
            temperature: 0.7,
            stream: false
        );

        $response = $this->client->chat($messages, $options);

        return new GrokResponse($response);
    }

    /**
     * Analyze an image using Grok Vision models.
     */
    public function vision(): GrokVision
    {
        return new GrokVision($this->client);
    }
}
