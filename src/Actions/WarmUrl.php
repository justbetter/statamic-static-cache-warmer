<?php

namespace JustBetter\StaticCacheWarmer\Actions;

use Illuminate\Support\Facades\Http;
use JustBetter\StaticCacheWarmer\Contracts\WarmsUrl;

class WarmUrl implements WarmsUrl
{
    public function warm(string $url): void
    {
        Http::get($url);
    }

    public static function bind(): void
    {
        app()->bind(WarmsUrl::class, static::class);
    }
}
