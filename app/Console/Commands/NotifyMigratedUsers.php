<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\AccountMigrated;
use Illuminate\Console\Command;

class NotifyMigratedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'one-off:notify-migrated-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify migrated users of their account migration';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::whereNull('user_migration_notified_at')->get();

        $users->each(function (User $user) {
            $user->notify(new AccountMigrated());

            $user->forceFill(['user_migration_notified_at' => now()]);
            $user->save();
        });

        return Command::SUCCESS;
    }
}
