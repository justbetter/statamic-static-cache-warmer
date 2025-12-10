<?php

namespace JustBetter\StaticCacheWarmer\Contracts;

interface WarmsUrls
{
    public function warm(): void;
}
