<?php

namespace JustBetter\StaticCacheWarmer\Contracts;

interface WarmsUrl
{
    public function warm(string $url): void;
}
