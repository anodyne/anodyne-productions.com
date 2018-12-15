<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        \Domain\Help\Events\ArticleCreated::class => [],
        \Domain\Help\Events\ArticleDeleted::class => [],
        \Domain\Help\Events\ArticleUpdated::class => [],

        \Domain\Xtras\Events\XtraCreated::class => [],
        \Domain\Xtras\Events\XtraDeleted::class => [],
        \Domain\Xtras\Events\XtraUpdated::class => [],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
