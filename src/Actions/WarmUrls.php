<?php

namespace JustBetter\StaticCacheWarmer\Actions;

use Illuminate\Support\Facades\Bus;
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

        $jobs = [];
        foreach ($entries as $entry) {
            $jobs[] = new WarmUrlJob($entry->absoluteUrl());
        }

        if (! empty($jobs)) {
            Bus::batch($jobs)->dispatch();
        }
    }

    public static function bind(): void
    {
        app()->bind(WarmsUrls::class, static::class);
    }
}
