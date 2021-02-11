<?php

namespace Domain\Users\Commands;

use Domain\Users\Models\User;
use Illuminate\Console\Command;

class CleanupDeletedUsers extends Command
{
    public $signature = 'anodyne:cleanup-users
                         {--days=7 : Soft-deleted users older than the provided days will be force deleted.}';

    public $description = 'Clean up soft-deleted users';

    public function handle()
    {
        $users = User::where('deleted_at', '<', now()->subDays($this->argument('days'))->startOfDay());

        $users->each->forceDelete();

        $this->info("{$users->count()} users were force deleted.");
    }
}
