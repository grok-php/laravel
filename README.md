# 🧠 Grok AI Laravel

![Grok AI Laravel](assets/images/grok-laravel.png)

**Seamlessly integrate Grok AI into Laravel applications with an elegant, developer-friendly package.**  
Leverage **powerful AI models** for **chat, automation, and NLP**, while maintaining Laravel's expressive simplicity.

[![Latest Version](https://img.shields.io/packagist/v/grok-php/laravel)](https://packagist.org/packages/grok-php/laravel)
[![PHP Version](https://img.shields.io/badge/PHP-8.1%2B-blue)](https://php.net)
[![Laravel Version](https://img.shields.io/badge/Laravel-10%2B-red)](https://laravel.com)
[![License](https://img.shields.io/badge/license-MIT-brightgreen)](LICENSE.md)

---

## 📖 Table of Contents
- [✨ Features](#-features)
- [📦 Installation](#-installation)
- [🚀 Quick Start](#-quick-start)
  - [Basic Usage](#basic-usage)
  - [Advanced Configuration](#advanced-configuration)
- [📌 Available Grok AI Models](#-available-grok-ai-models)
- [⚡ Streaming Responses](#-streaming-responses)
- [🧪 Testing](#-testing)
- [🔒 Security](#-security)
- [🤝 Contributing](#-contributing)
- [📄 License](#-license)

---

## ✨ Features

✅ **Seamless Laravel Integration** – Works effortlessly with Laravel 10+  
✅ **Simple API Client** – Access Grok AI models with a fluent, clean syntax  
✅ **Supports All Grok AI Models** – Choose from multiple **LLM & vision models**  
✅ **Streaming Capable** – Enable **real-time AI responses** for interactive experiences  
✅ **Configurable Defaults** – Set your preferred model, temperature, and more  

---

## 📦 Installation

Install via **Composer**:
```sh
composer require grok-php/laravel
```

After installation, run the setup command:

```sh
php artisan grok:install
```
This command will:

- Publish the configuration file (`config/grok.php`).
- Add necessary environment variables to `.env` and `.env.example`.

Add your API key in `.env`:
```sh
GROK_API_KEY=your-api-key
```

---


## 🚀 Quick Start

### Basic Usage

```php
use GrokPHP\Laravel\Facades\GrokAI;
use GrokPHP\Client\Config\ChatOptions;
use GrokPHP\Client\Enums\Model;

$response = GrokAI::chat(
    [['role' => 'user', 'content' => 'Hello Grok!']],
    new ChatOptions(model: Model::GROK_2)
);

echo $response['choices'][0]['message']['content'];
```

### 📌 Defaults Used:
Model: grok-2
Temperature: 0.7
Streaming: false

### Advanced Configuration
Modify your `config/grok.php` file:

```php
return [
    'api_key' => env('GROK_API_KEY'),
    'base_uri' => env('GROK_BASE_URI', 'https://api.grok.com/v1'),
    'default_model' => env('GROK_DEFAULT_MODEL', 'grok-2'),
    'default_temperature' => env('GROK_DEFAULT_TEMPERATURE', 0.7),
    'enable_streaming' => env('GROK_ENABLE_STREAMING', false),
    'timeout' => env('GROK_API_TIMEOUT', 30),
];
```

📌 You can override any setting dynamically:

```php
$response = GrokAI::chat(
    [['role' => 'user', 'content' => 'Explain black holes']],
    new ChatOptions(model: Model::GROK_2_LATEST, temperature: 1.2, stream: true)
);
```
---




## 📌 Available Grok AI Models
Grok AI offers multiple models, each optimized for different use cases.
These models are available in the Model enum inside our package:
📄 `src/Enums/Model.php`

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

#### 📌 Default model used: `Model::GROK_2`
---


## ⚡ Streaming Responses
Enable real-time AI responses by setting `stream: true`:

```php
$response = GrokAI::chat(
    [['role' => 'user', 'content' => 'Tell me a story']],
    new ChatOptions(model: Model::GROK_2, stream: true)
);
```
Streaming is useful for chatbots, assistants, and real-time applications.
---

## 🧪 Testing
Run tests using Pest PHP:

```sh
composer test
or
vendor/bin/phpunit
```

## 🔒 Security
If you discover a security vulnerability, please report it via email:
📩 [thefeqy@gmail.com](mailto:thefeqy@gmail.com)   

## 🤝 Contributing

Want to improve this package? Check out [CONTRIBUTE.md](CONTRIBUTE.md) for contribution guidelines.

## 📄 License

This package is open-source software licensed under the [MIT License](LICENSE).