<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\AccountMigrated;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

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
        $users = User::get();

        $users->each(function (User $user) {
            $user->forceFill(['password' => $password = Str::random(12)])->update();

            $user->notify(new AccountMigrated($password));
        });

        return Command::SUCCESS;
    }
}
