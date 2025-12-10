<?php

namespace JustBetter\StaticCacheWarmer\Tests;

use JustBetter\StaticCacheWarmer\ServiceProvider;
use Statamic\Testing\AddonTestCase;
use Statamic\Testing\Concerns\PreventsSavingStacheItemsToDisk;

class TestCase extends AddonTestCase
{
    use PreventsSavingStacheItemsToDisk;

    protected string $addonServiceProvider = ServiceProvider::class;

    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);

        $app['config']->set('statamic.editions.pro', true);

        $app['config']->set('statamic.static_caching.strategy', 'full');
    }

    protected function withStaticCacheDisabled(): void
    {
        app()['config']->set('statamic.static_caching.strategy', 'null');
    }
}
