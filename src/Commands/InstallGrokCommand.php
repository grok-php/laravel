<?php

namespace GrokPHP\Laravel\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallGrokCommand extends Command
{
    protected $signature = 'grok:install';
    protected $description = 'Prepares the Grok AI client for use in Laravel.';

    private const REPO_URL = 'https://github.com/grok-php/laravel';

    public function handle(): void
    {
        // Check if the package is already installed
        if ($this->isAlreadyInstalled()) {
            $this->warn('⚠️ Grok AI is already installed. No changes were made.');
            return;
        }

        $this->info('🚀 Installing Grok AI for Laravel...');

        $this->copyConfig();
        $this->addEnvKeys('.env');
        $this->addEnvKeys('.env.example');

        // Mark installation as complete
        $this->markAsInstalled();

        $this->info("\n✅ Installation complete! Don't forget to set your API key in your .env file.");

        // Ask user to star the repository
        if ($this->askToStarRepository()) {
            $this->openRepositoryInBrowser();
        }
    }

    /**
     * Checks if Grok AI is already installed.
     */
    private function isAlreadyInstalled(): bool
    {
        return File::exists(storage_path('grok_installed.lock'));
    }

    /**
     * Marks the package as installed by creating a lock file.
     */
    private function markAsInstalled(): void
    {
        File::put(storage_path('grok_installed.lock'), now()->toDateTimeString());
    }

    /**
     * Publishes the config file if it doesn't already exist.
     */
    private function copyConfig(): void
    {
        if (file_exists(config_path('grok.php'))) {
            $this->warn('⚠️ Config file already exists: config/grok.php');
            return;
        }

        $this->callSilent('vendor:publish', [
            '--tag' => 'grok-config',
        ]);

        $this->info('✅ Config file published: config/grok.php');
    }

    /**
     * Adds missing environment variables to the given env file with comments.
     */
    private function addEnvKeys(string $envFile): void
    {
        $filePath = base_path($envFile);

        if (! file_exists($filePath)) {
            $this->warn("⚠️ Skipping: {$envFile} not found.");
            return;
        }

        $fileContent = file_get_contents($filePath);

        // Grok AI environment variables with comments
        $envSection = <<<EOL

# --------------------------------------------------------------------------
# 🧠 GROK AI CONFIGURATION
# These variables are required for Grok AI to function in Laravel.
# --------------------------------------------------------------------------

GROK_API_KEY=
GROK_BASE_URI=https://api.x.ai/v1/
GROK_DEFAULT_MODEL=grok-2
GROK_DEFAULT_TEMPERATURE=0.7
GROK_ENABLE_STREAMING=false
GROK_API_TIMEOUT=30

EOL;

        // Check if any of the variables already exist
        if (str_contains($fileContent, 'GROK_API_KEY')) {
            $this->info("✅ {$envFile} is already up to date.");
            return;
        }

        // Append the section to the .env file
        file_put_contents($filePath, PHP_EOL . $envSection . PHP_EOL, FILE_APPEND);

        $this->info("✅ Added Grok AI environment variables to {$envFile}");
    }

    /**
     * Asks the user if they want to star the GitHub repository.
     */
    private function askToStarRepository(): bool
    {
        if (! $this->input->isInteractive()) {
            return false;
        }

        return $this->confirm('⭐ Want to show Grok AI some love by starring it on GitHub?', false);
    }

    /**
     * Opens the repository in the user's default browser.
     */
    private function openRepositoryInBrowser(): void
    {
        $this->info('Opening GitHub repository... 🌍');

        if (PHP_OS_FAMILY === 'Darwin') {
            exec('open ' . self::REPO_URL);
        } elseif (PHP_OS_FAMILY === 'Windows') {
            exec('start ' . self::REPO_URL);
        } elseif (PHP_OS_FAMILY === 'Linux') {
            exec('xdg-open ' . self::REPO_URL);
        }
    }
}
