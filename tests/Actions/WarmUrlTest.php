<?php

namespace JustBetter\StaticCacheWarmer\Tests\Actions;

use Illuminate\Support\Facades\Http;
use JustBetter\StaticCacheWarmer\Contracts\WarmsUrl;
use JustBetter\StaticCacheWarmer\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class WarmUrlTest extends TestCase
{
    #[Test]
    public function it_can_send_a_request(): void
    {
        Http::fake([
            'https://example.com' => Http::response('', 200),
        ]);

        $action = app(WarmsUrl::class);

        $action->warm('https://example.com');

        Http::assertSentCount(1);
    }
}
