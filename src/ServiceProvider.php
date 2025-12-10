<?php

namespace JustBetter\StaticCacheWarmer;

use JustBetter\StaticCacheWarmer\Actions\WarmUrl;
use JustBetter\StaticCacheWarmer\Actions\WarmUrls;
use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    public function bootAddon(): void
    {
        $this->bootConfig();
    }

    public function register(): void
    {
        parent::register();

        $this->registerConfig()
            ->registerActions();
    }

    protected function registerConfig(): static
    {
        $this->mergeConfigFrom(__DIR__.'/../config/static-cache-warmer.php', 'justbetter.static-cache-warmer');

        return $this;
    }

    protected function registerActions(): static
    {
        WarmUrls::bind();
        WarmUrl::bind();

        return $this;
    }

    protected function bootConfig(): static
    {
        $this->publishes([
            __DIR__.'/../config/static-cache-warmer.php' => config_path('justbetter/static-cache-warmer.php'),
        ], 'justbetter-static-cache-warmer');

        return $this;
    }
}
