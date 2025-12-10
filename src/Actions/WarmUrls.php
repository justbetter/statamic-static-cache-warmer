<?php

namespace JustBetter\StaticCacheWarmer\Actions;

use JustBetter\StaticCacheWarmer\Contracts\WarmsUrls;
use JustBetter\StaticCacheWarmer\Jobs\WarmUrlJob;
use Statamic\Eloquent\Entries\EntryQueryBuilder;
use Statamic\Facades\Entry;

class WarmUrls implements WarmsUrls
{
    public function warm(): void
    {
        /** @var EntryQueryBuilder $query */
        $query = Entry::query();

        $entries = $query->whereNotNull('uri')->lazy();

        foreach ($entries as $entry) {
            WarmUrlJob::dispatch($entry->absoluteUrl());
        }
    }

    public static function bind(): void
    {
        app()->bind(WarmsUrls::class, static::class);
    }
}
