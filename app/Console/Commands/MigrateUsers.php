<?php

namespace App\Console\Commands;

use App\Enums\LinkType;
use App\Models\Legacy\User as LegacyUser;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MigrateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'one-off:migrate-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate users from the old database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $legacyUsers = LegacyUser::get();

        $bar = $this->output->createProgressBar(count($legacyUsers));

        $legacyUsers->each(function (LegacyUser $legacyUser) use ($bar) {
            $username = str($legacyUser->username)
                ->replace([' ', '\'', '"'], '')
                ->before('@');

            $user = User::where('email', $legacyUser->email)->first();

            if ($user) {
                $user->forceFill(['legacy_id' => $legacyUser->id])->save();
            } else {
                $password = Str::random(12);

                $newUser = new User();
                $newUser->name = $username;
                $newUser->username = $username;
                $newUser->email = $legacyUser->email;
                $newUser->legacy_id = $legacyUser->id;
                $newUser->password = Hash::make($password);
                $newUser->links = $this->setLinksFromLegacyUser($legacyUser);
                $newUser->save();
            }

            $bar->advance();
        });

        $bar->finish();

        $this->newLine();

        $this->info(count($legacyUsers).' users migrated');

        return Command::SUCCESS;
    }

    protected function setLinksFromLegacyUser(LegacyUser $user): ?array
    {
        $links = [];

        if (! is_null($user->twitter)) {
            $links[] = [
                'type' => LinkType::twitter,
                'value' => 'https://twitter.com/'.str($user->twitter)->after('@'),
            ];
        }

        if (! is_null($user->facebook)) {
            $links[] = [
                'type' => LinkType::facebook,
                'value' => 'https://facebook.com/'.str($user->facebook)->after('facebook.com/'),
            ];
        }

        return $links;
    }
}
