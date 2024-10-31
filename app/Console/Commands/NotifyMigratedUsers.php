<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\AccountMigrated;
use Illuminate\Console\Command;

class NotifyMigratedUsers extends Command
{
    protected $signature = 'one-time:notify-migrated-users';

    protected $description = 'Notify migrated users of their account migration';

    public function handle()
    {
        $this->error('Notifying users of account migration is a one-time command that cannot be run again.');

        return Command::INVALID;

        $users = User::whereNull('user_migration_notified_at')->get();

        $bar = $this->output->createProgressBar(count($users));

        $notifiedUsers = 0;

        $users->each(function (User $user) use ($bar, &$notifiedUsers) {
            try {
                $user->notify(new AccountMigrated);

                $bar->advance();

                $user->forceFill(['user_migration_notified_at' => now()]);
                $user->save();

                $notifiedUsers++;
            } catch (\Throwable $th) {
                $this->error('Unable to notify '.$user->email);
            }
        });

        $bar->finish();

        $this->newLine();

        $this->info($notifiedUsers.' users notified');

        return Command::SUCCESS;
    }
}
