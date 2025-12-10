<?php

namespace JustBetter\StaticCacheWarmer\Listeners;

use JustBetter\StaticCacheWarmer\Jobs\WarmUrlJob;
use Statamic\Events\UrlInvalidated;

class UrlInvalidatedListener
{
    public function handle(UrlInvalidated $event): void
    {
        WarmUrlJob::dispatch($event->url);
    }
}
