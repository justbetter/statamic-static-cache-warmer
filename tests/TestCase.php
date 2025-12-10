<?php

namespace JustBetter\StaticCacheWarmer\Tests;

use JustBetter\StaticCacheWarmer\ServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            ServiceProvider::class,
        ];
    }
}
