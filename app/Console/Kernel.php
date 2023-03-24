<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('activitylog:clean')->weekly();

        // $schedule->command('anodyne:cleanup-users')->daily();

        $schedule->command('anodyne:fetch-sponsorship-tiers')->dailyAt('01:00');

        $schedule->command('anodyne:fetch-sponsors')->dailyAt('01:30');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
