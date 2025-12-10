<?php

namespace JustBetter\StaticCacheWarmer\Tests\Listeners;

use Illuminate\Support\Facades\Bus;
use JustBetter\StaticCacheWarmer\Jobs\WarmUrlJob;
use JustBetter\StaticCacheWarmer\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Statamic\Events\UrlInvalidated;

class UrlInvalidatedListenerTest extends TestCase
{
    #[Test]
    public function it_can_dispatch_warm_job(): void
    {
        Bus::fake();

        UrlInvalidated::dispatch('https://example.com');

        Bus::assertDispatched(WarmUrlJob::class);
    }
}
