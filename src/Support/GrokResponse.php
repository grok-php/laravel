<?php

namespace GrokPHP\Laravel\Support;

class GrokResponse implements \JsonSerializable
{
    private array $response;

    public function __construct(array $response)
    {
        $this->response = $response;
    }

    /**
     * Get the full API response.
     */
    public function full(): array
    {
        return $this->response;
    }

    /**
     * Get only the assistant's message content.
     */
    public function content(): string
    {
        return $this->response['choices'][0]['message']['content'] ?? 'No response received.';
    }

    /**
     * Get the usage statistics for the API response.
     */
    public function usage(): array
    {
        return $this->response['usage'] ?? [];
    }

    /**
     * Allow the GrokResponse object to be serialized to JSON.
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->response;
    }
}
