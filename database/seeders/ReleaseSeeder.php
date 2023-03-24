<?php

namespace Database\Seeders;

use App\Enums\ReleaseSeverity;
use App\Models\Release;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ReleaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Release::factory()->create([
            'version' => '2.7.3',
            'date' => Carbon::createFromDate(2023, 1, 7),
            'severity' => ReleaseSeverity::patch,
            'notes' => "Nova 2.7.3 addresses an issue that games with the BLANK genre have had doing the update to 2.7. We have made some small updates to the UI for update notifications that you'll see in future updates. We've also added some analytics gathering to the install and update processes to help with future support and product decisions. When updating this version of Nova, we recommend updating the index.php file as well.",
            'link' => 'https://anodyne-productions.com/nova',
            'published' => true,
        ]);

        Release::factory()->create([
            'version' => '2.7.4',
            'date' => Carbon::createFromDate(2023, 1, 27),
            'severity' => ReleaseSeverity::patch,
            'notes' => "Nova 2.7.4 addresses issues with some databases throwing errors with fields that are not marked as nullable. In addition, we've improved support for PHP 8.2 with this release.",
            'link' => 'https://anodyne-productions.com/nova',
            'published' => true,
        ]);
    }
}
