<?php

namespace JustBetter\StaticCacheWarmer\Tests\Jobs;

use JustBetter\StaticCacheWarmer\Contracts\WarmsUrls;
use JustBetter\StaticCacheWarmer\Jobs\WarmUrlsJob;
use JustBetter\StaticCacheWarmer\Tests\TestCase;
use Mockery\MockInterface;
use PHPUnit\Framework\Attributes\Test;

class WarmUrlsJobTest extends TestCase
{
    #[Test]
    public function it_can_warm_urls(): void
    {
        $this->mock(WarmsUrls::class, function (MockInterface $mock) {
            $mock->shouldReceive('warm')->once();
        });

        WarmUrlsJob::dispatch();
    }
}
