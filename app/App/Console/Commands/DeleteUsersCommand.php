<?php

namespace App\Console\Commands;

use Domain\Account\Models\User;
use Illuminate\Console\Command;
use Domain\Account\Actions\ForceDeleteUser;

class DeleteUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anodyne:delete-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete any soft-deleted users.';

    protected $action;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ForceDeleteUser $action)
    {
        parent::__construct();

        $this->action = $action;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::whereReadyForDeletion()->get();

        $this->line('');

        $users->each(function ($user) {
            $this->action->execute($user);

            $this->info("Deleted {$user->name}...");
        });

        $this->line('');
        $this->info('User cleanup completed!');
    }
}
