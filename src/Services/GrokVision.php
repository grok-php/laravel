<?php

namespace GrokPHP\Laravel\Services;

use GrokPHP\Client\Clients\GrokClient;
use GrokPHP\Client\Enums\Model;
use GrokPHP\Client\Exceptions\GrokException;
use GrokPHP\Laravel\Support\GrokResponse;

class GrokVision
{
    protected GrokClient $client;

    public function __construct(GrokClient $client)
    {
        $this->client = $client;
    }

    /**
     * Analyze an image using Grok Vision models.
     *
     * @throws GrokException
     */
    public function analyze(string $imagePath, string $prompt, ?Model $model = null): GrokResponse
    {
        $response = $this->client->vision()->analyze($imagePath, $prompt, $model);

        return new GrokResponse($response);
    }
}
