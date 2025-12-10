<?php

namespace JustBetter\StaticCacheWarmer\Listeners;

use JustBetter\StaticCacheWarmer\Jobs\WarmUrlsJob;
use Statamic\Events\StaticCacheCleared;

class StaticCacheClearedListener
{
    public function handle(StaticCacheCleared $event): void
    {
        $enabled = config('statamic.static_caching.strategy');

        if ($enabled !== 'full') {
            return;
        }

        WarmUrlsJob::dispatch();
    }
}
