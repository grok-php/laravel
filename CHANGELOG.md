# Changelog

All notable changes to `GrokPHP/Laravel` will be documented in this file.  
This project follows [Semantic Versioning](https://semver.org/).

---

## [v1.1.0] - 2024-02-25
### New Features
- **Added Vision API Support**: The package now supports analyzing images using Grok AI Vision models.
    - New method: `GrokAI::vision()->analyze($imagePath, $prompt)`.
    - Supports models: `grok-2-vision-1212`, `grok-2-vision`, and `grok-2-vision-latest`.

### Improvements
- **Switched from Pest to PHPUnit** for better Laravel compatibility.
- **Introduced `GrokResponse`**: A response wrapper for easier result handling.
- **Enhanced Exception Handling**:
    - Proper error handling for image inputs when used with non-vision models.
    - Improved API key error handling.
- **Refactored Service Provider** for better maintainability.
- **Dropped Support for PHP 8.1**: Now requires **PHP 8.2+**.
- **Added Support for Laravel 12**: Compatible with **Laravel 10, 11, and 12**.

### Internal Changes
- Improved test coverage for **chat and vision API features**.
- Refactored code to follow **SOLID principles**.
- Added GitHub Actions CI workflow to support **PHP 8.3, and 8.4**.


---

## [v1.0.0] - 2025-02-07
### Initial Release
- Released `GrokPHP/Laravel` v1.0.0, a Laravel wrapper for **Grok AI Client**.
- Added support for **chat models** with a simple, fluent syntax.

---

### Notes
- For detailed usage, refer to the [README.md](README.md).
- Found an issue? Report it on [GitHub Issues](https://github.com/grok-php/laravel/issues).  
