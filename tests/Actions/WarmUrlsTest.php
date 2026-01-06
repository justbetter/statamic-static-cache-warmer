<?php

namespace JustBetter\StaticCacheWarmer\Tests\Actions;

use Illuminate\Support\Facades\Bus;
use JustBetter\StaticCacheWarmer\Contracts\WarmsUrls;
use JustBetter\StaticCacheWarmer\Jobs\WarmUrlJob;
use JustBetter\StaticCacheWarmer\Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Statamic\Entries\Entry;
use Statamic\Facades\Collection;
use Statamic\Facades\Entry as EntryFacade;

class WarmUrlsTest extends TestCase
{
    #[Test]
    public function it_can_dispatch_jobs_in_batch(): void
    {
        Bus::fake();

        $collection = Collection::make('pages');
        $collection->routes([
            'default' => '/{slug}',
        ])->save();

        /** @var Entry $entry */
        $entry = EntryFacade::make();
        $entry
            ->collection('pages')
            ->slug('some-page')
            ->save();

        $action = app(WarmsUrls::class);

        $action->warm();

        Bus::assertBatched(function ($batch) {
            return $batch->jobs->count() > 0
                && $batch->jobs->first() instanceof WarmUrlJob;
        });
    }
}
