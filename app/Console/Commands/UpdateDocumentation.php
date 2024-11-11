<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;

class UpdateDocumentation extends Command
{
    protected $signature = 'anodyne:update-docs';

    protected $description = 'Update the documentation on the live site';

    public function handle()
    {
        Process::run(
            'bash ./bin/checkout_latest_docs.sh',
            function (string $type, string $output) {
                echo $output;
            }
        );

        $this->call('view:clear');

        $this->info('Documentation updates complete');

        return Command::SUCCESS;
    }
}
