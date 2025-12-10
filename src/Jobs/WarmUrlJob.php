<?php

namespace JustBetter\StaticCacheWarmer\Jobs;

use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use JustBetter\StaticCacheWarmer\Contracts\WarmsUrl;

class WarmUrlJob implements ShouldBeUnique, ShouldQueue
{
    use Queueable;

    public function __construct(protected string $url)
    {
        $this->onQueue(config()->string('justbetter.static-cache-warmer.queue'));
    }

    public function handle(WarmsUrl $warmsEntry): void
    {
        $warmsEntry->warm($this->url);
    }

    public function uniqueId(): string
    {
        return $this->url;
    }

    /**
     * @return array<int, string>
     */
    public function tags(): array
    {
        return [
            $this->url,
        ];
    }
}
