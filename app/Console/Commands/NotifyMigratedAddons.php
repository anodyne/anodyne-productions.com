<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\AddonsMigrated;
use Illuminate\Console\Command;

class NotifyMigratedAddons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'one-off:notify-migrated-addons';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::whereHas('addons')->whereNull('addon_migration_notified_at')->get();

        $users->each(function (User $user) {
            $user->notify(new AddonsMigrated());

            $user->forceFill(['addon_migration_notified_at' => now()]);
            $user->save();
        });

        return Command::SUCCESS;
    }
}
