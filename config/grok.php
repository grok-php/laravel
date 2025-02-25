<?php

use GrokPHP\Client\Enums\DefaultConfig;

return [

    /*
    |--------------------------------------------------------------------------
    | Grok AI API Key
    |--------------------------------------------------------------------------
    |
    | This is your Grok AI API key, required for making API requests.
    | It should be set in your .env file for security reasons.
    |
    */
    'api_key' => env('GROK_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | API Base URL
    |--------------------------------------------------------------------------
    |
    | Define the base URL for the Grok AI API. This usually points to the
    | official API endpoint but can be customized for different environments.
    |
    */
    'base_uri' => env('GROK_BASE_URI', DefaultConfig::BASE_URI->value),

    /*
    |--------------------------------------------------------------------------
    | Default AI Model
    |--------------------------------------------------------------------------
    |
    | Choose the default AI model to use when making requests.
    | Available models are defined in GrokPHP\Client\Enums\Model.
    |
    | Example: 'grok-2', 'grok-2-latest', 'grok-vision-beta'
    |
    */
    'default_model' => env('GROK_DEFAULT_MODEL', DefaultConfig::MODEL->value),

    /*
    |--------------------------------------------------------------------------
    | Default Temperature
    |--------------------------------------------------------------------------
    |
    | Controls the randomness of the AI’s responses.
    | Lower values (e.g., 0.1) make responses more deterministic,
    | while higher values (e.g., 1.5) make them more creative.
    |
    */
    'default_temperature' => env('GROK_DEFAULT_TEMPERATURE', (float) DefaultConfig::TEMPERATURE->value),

    /*
    |--------------------------------------------------------------------------
    | Streaming Mode
    |--------------------------------------------------------------------------
    |
    | Enable or disable streaming responses. When enabled, responses
    | will be returned in real-time as they are generated.
    |
    | Accepted values: true or false
    |
    */
    'enable_streaming' => env('GROK_ENABLE_STREAMING', DefaultConfig::STREAMING->value === 'true'),

    /*
    |--------------------------------------------------------------------------
    | Default Timeout (in seconds)
    |--------------------------------------------------------------------------
    |
    | Set the maximum time (in seconds) before the API request times out.
    | This helps prevent long waits for responses.
    |
    */
    'timeout' => env('GROK_API_TIMEOUT', (int) DefaultConfig::TIMEOUT->value),
];
