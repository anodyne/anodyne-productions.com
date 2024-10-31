<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\AddonsMigrated;
use Illuminate\Console\Command;

class NotifyMigratedAddons extends Command
{
    protected $signature = 'one-time:notify-migrated-addons';

    protected $description = 'Command description';

    public function handle()
    {
        $this->error('Notifying authors of migrated add-ons is a one-time command that cannot be run again.');

        return Command::INVALID;

        $users = User::whereHas('addons')->whereNull('addon_migration_notified_at')->get();

        $users->each(function (User $user) {
            $user->notify(new AddonsMigrated);

            $user->forceFill(['addon_migration_notified_at' => now()]);
            $user->save();
        });

        return Command::SUCCESS;
    }
}
