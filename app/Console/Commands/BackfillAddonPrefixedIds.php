<?php

namespace App\Console\Commands;

use App\Models\Addon;
use Illuminate\Console\Command;
use ReflectionMethod;

class BackfillAddonPrefixedIds extends Command
{
    protected $signature = 'one-time:backfill-addon-prefixed-ids';

    protected $description = 'Backfill all add-ons with a prefixed ID';

    public function handle()
    {
        Addon::withoutTimestamps(function () {
            $addons = Addon::withTrashed()->whereNull('prefixed_id')->get();

            $reflectedMethod = new ReflectionMethod(Addon::class, 'generatePrefixedId');

            foreach ($addons as $addon) {
                $addon->forceFill(['prefixed_id' => $reflectedMethod->invoke($addon)]);
                $addon->save();
            }
        });

        $this->info('Add-ons have been back-filled with prefixed IDs');

        return Command::SUCCESS;
    }
}
