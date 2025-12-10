# Statamic Static cache warmer


## Features

- 🔄 Automaticly warming an entry's static cache when cleared

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

Make sure to publish the config by running:

```bash
php artisan vendor:publish --tag=justbetter-structured-data
```

You can now find the config file at `config/justbetter/structured-data.php`.
After publishing the config, you can set the collections and taxonomies that should have structured data templates.

## Usage

## Configuration