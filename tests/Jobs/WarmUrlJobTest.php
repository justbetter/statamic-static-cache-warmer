<?php

namespace JustBetter\StaticCacheWarmer\Tests\Jobs;

use JustBetter\StaticCacheWarmer\Contracts\WarmsUrl;
use JustBetter\StaticCacheWarmer\Jobs\WarmUrlJob;
use JustBetter\StaticCacheWarmer\Tests\TestCase;
use Mockery\MockInterface;
use PHPUnit\Framework\Attributes\Test;

class WarmUrlJobTest extends TestCase
{
    #[Test]
    public function it_can_warm_urls(): void
    {
        $url = 'https://example.com';
        $this->mock(WarmsUrl::class, function (MockInterface $mock) use ($url) {
            $mock->shouldReceive('warm')->once()->with($url);
        });

        WarmUrlJob::dispatch($url);
    }

    #[Test]
    public function it_can_have_the_right_tags(): void
    {
        $url = 'https://example.com';

        $job = new WarmUrlJob($url);

        $this->assertEquals([$url], $job->tags());
    }
}
