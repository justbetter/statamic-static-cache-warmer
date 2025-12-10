# Statamic Static cache warmer

This Statamic addon provides event listeners to automaticly warm the static cache of urls when they are cleared.

## Requirements

- PHP ^8.3 or ^8.4
- Laravel ^12.0
- Statamic ^5.0

## Installation

You can install this addon via Composer:

```bash
composer require just-better/statamic-static-cache-warmer
```

## Configuration

You can publish the config by

```bash
php artisan vendor:publish --tag=justbetter-static-cache-warmer
```

You can now find the config file at `config/justbetter/static-cache-warmer.php`.
After publishing the config, you can set the queue.