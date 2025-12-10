<?php

namespace JustBetter\StaticCacheWarmer\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use JustBetter\StaticCacheWarmer\Contracts\WarmsUrls;

class WarmUrlsJob implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
        $this->onQueue(config()->string('justbetter.static-cache-warmer.queue'));
    }

    public function handle(WarmsUrls $warmsUrls): void
    {
        $warmsUrls->warm();
    }
}
