### **Grok AI Laravel**

**Effortlessly integrate Grok AI into Laravel applications with a clean, developer-friendly package.**  
Leverage **powerful AI models** for **chat, automation, vision, and natural language processing (NLP)** while maintaining Laravel's expressive simplicity.

[![Latest Version](https://img.shields.io/packagist/v/grok-php/laravel)](https://packagist.org/packages/grok-php/laravel)  
[![PHP Version](https://img.shields.io/badge/PHP-8.2%2B-blue)](https://php.net)  
[![Laravel Version](https://img.shields.io/badge/Laravel-10%2B-red)](https://laravel.com)  
[![License](https://img.shields.io/badge/license-MIT-brightgreen)](LICENSE)  
[![Tests](https://github.com/grok-php/laravel/actions/workflows/run-tests.yml/badge.svg)](https://github.com/grok-php/laravel/actions)

---

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Quick Start](#quick-start)
    - [Chat API](#chat-api)
    - [Vision Analysis](#vision-analysis-image-recognition)
    - [Error Handling](#error-handling)
- [Available Grok AI Models](#available-grok-ai-models)
- [Streaming Responses](#streaming-responses)
- [Testing](#testing)
- [Security](#security)
- [Contributing](#contributing)
- [License](#license)

---

## Features

- **Seamless Laravel Integration** – Works with Laravel 10, 11, and 12
- **Simple API Client** – Access Grok AI models with a clean and intuitive API
- **Supports Chat & Vision** – Send both text and image-based requests
- **Streaming Capable** – Enable real-time AI responses
- **Configurable Defaults** – Set model, temperature, and timeout via config

---

## Installation

Install via Composer:

```sh
composer require grok-php/laravel
```

After installation, run the setup command:

```sh
php artisan grok:install
```

This command will:

- Publish the configuration file (`config/grok.php`).
- Add necessary environment variables to `.env`.

Add your API key in `.env`:

```sh
GROK_API_KEY=your-api-key
```

---

## Quick Start

### Chat API

```php
use GrokPHP\Laravel\Facades\GrokAI;
use GrokPHP\Client\Config\ChatOptions;
use GrokPHP\Client\Enums\Model;

$response = GrokAI::chat(
    [['role' => 'user', 'content' => 'Hello Grok!']],
    new ChatOptions(model: Model::GROK_2)
);

echo $response->content();
```

### Vision Analysis (Image Recognition)

```php
$response = GrokAI::vision()->analyze(
    'https://example.com/sample.jpg',
    'Describe this image'
);

echo $response->content();
```

### Error Handling

All errors are wrapped in the `GrokException` class:

```php
use GrokPHP\Client\Exceptions\GrokException;

try {
    $response = GrokAI::chat(
        [['role' => 'user', 'content' => 'Hello!']]
    );
    echo $response->content();
} catch (GrokException $e) {
    echo "Error: " . $e->getMessage();
}
```

---

## Available Grok AI Models

| Model Enum                  | API Model Name       | Description                                         |
|-----------------------------|----------------------|-----------------------------------------------------|
| `Model::GROK_VISION_BETA`     | grok-vision-beta     | Experimental vision-enabled model                   |
| `Model::GROK_2_VISION`        | grok-2-vision        | Advanced multi-modal vision model                   |
| `Model::GROK_2_VISION_LATEST` | grok-2-vision-latest | Latest iteration of Grok vision models              |
| `Model::GROK_2_VISION_1212`   | grok-2-vision-1212   | Enhanced vision model with performance improvements |
| `Model::GROK_2_1212`          | grok-2-1212          | Optimized chat model                                |
| `Model::GROK_2`               | grok-2               | Default general-purpose Grok model                  |
| `Model::GROK_2_LATEST`        | grok-2-latest        | Latest iteration of Grok-2                          |
| `Model::GROK_BETA`            | grok-beta            | Experimental beta model                             |

Default model used: `Model::GROK_2`

---

## Streaming Responses

Enable real-time AI responses by setting `stream: true`:

```php
$response = GrokAI::chat(
    [['role' => 'user', 'content' => 'Tell me a story']],
    new ChatOptions(model: Model::GROK_2, stream: true)
);
```

Streaming is useful for chatbots, assistants, and real-time applications.

---

## Testing

To run PHPUnit tests, copy the `phpunit.xml.dist` file to `phpunit.xml` and set your API key.

```sh
cp phpunit.xml.dist phpunit.xml
```

```xml
<php>
    <env name="GROK_API_KEY" value="your-grok-api-key"/>
</php>
```

Now, run the tests:

```sh
composer test
```

---

## Security

If you discover a security vulnerability, please report it via email:  
[thefeqy@gmail.com](mailto:thefeqy@gmail.com)

---

## Contributing

Check out [CONTRIBUTING.md](CONTRIBUTING.md) for guidelines on how to contribute.

---

## License

This package is open-source software licensed under the [MIT License](LICENSE).
