<?php

namespace App\Console\Commands;

use App\Models\SponsorTier;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchSponsorshipTiers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anodyne:fetch-sponsorship-tiers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch the sponsorship tiers from Patreon.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $campaignId = config('services.patreon.campaignId');

        $response = Http::withToken(config('services.patreon.token'))
            ->get("https://www.patreon.com/api/oauth2/v2/campaigns/{$campaignId}?include=tiers&fields[tier]=title,description");

        collect($response->json('included'))
            ->each(function ($tier) {
                SponsorTier::updateOrCreate(
                    ['external_id' => data_get($tier, 'id')],
                    [
                        'name' => data_get($tier, 'attributes.title'),
                        'description' => data_get($tier, 'attributes.description'),
                    ]
                );
            });

        $this->info('Sponsorship tiers updated');

        return Command::SUCCESS;
    }
}
