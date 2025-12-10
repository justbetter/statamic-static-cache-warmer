<?php

namespace JustBetter\StaticCacheWarmer\Tests\Listeners;

use Illuminate\Support\Facades\Bus;
use JustBetter\StaticCacheWarmer\Jobs\WarmUrlsJob;
use JustBetter\StaticCacheWarmer\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Statamic\Events\StaticCacheCleared;

class StaticCacheClearedListenerTest extends TestCase
{
    #[Test]
    public function it_can_dispatch_warm_job(): void
    {
        Bus::fake();

        StaticCacheCleared::dispatch();

        Bus::assertDispatched(WarmUrlsJob::class);
    }

    #[Test]
    public function it_can_not_warm_when_static_cache_disabled(): void
    {
        $this->withStaticCacheDisabled();
        Bus::fake();

        StaticCacheCleared::dispatch();

        Bus::assertNotDispatched(WarmUrlsJob::class);
    }
}
