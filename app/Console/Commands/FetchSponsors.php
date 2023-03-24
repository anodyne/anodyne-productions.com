<?php

namespace App\Console\Commands;

use App\Models\Sponsor;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchSponsors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anodyne:fetch-sponsors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch the sponsors from Patreon.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $campaignId = config('services.patreon.campaignId');

        $response = Http::withToken(config('services.patreon.token'))
            ->get("https://www.patreon.com/api/oauth2/v2/campaigns/{$campaignId}/members?include=currently_entitled_tiers&fields[member]=full_name,email,patron_status");

        collect($response->json('data'))
            ->each(function ($sponsor) {
                $user = User::where('email', $email = data_get($sponsor, 'attributes.email'))->first();

                Sponsor::updateOrCreate(
                    ['email' => $email],
                    [
                        'name' => data_get($sponsor, 'attributes.full_name'),
                        'sponsor_tier_id' => data_get($sponsor, 'relationships.currently_entitled_tiers.data.0.id'),
                        'active' => data_get($sponsor, 'attributes.patron_status') === 'active_patron',
                        'user_id' => $user?->id,
                    ]
                );
            });

        $this->info('Sponsors updated');

        return Command::SUCCESS;
    }
}
