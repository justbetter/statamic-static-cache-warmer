<?php

namespace JustBetter\StaticCacheWarmer\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use JustBetter\StaticCacheWarmer\ServiceProvider;

class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            ServiceProvider::class,
        ];
    }
}
