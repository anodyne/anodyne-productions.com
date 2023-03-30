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
        $users = User::whereHas('addons')->get();

        $users->each->notify(new AddonsMigrated());

        return Command::SUCCESS;
    }
}
