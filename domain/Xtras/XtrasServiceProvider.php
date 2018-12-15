<?php

namespace Domain\Xtras;

use Domain\Xtras\Events;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class XtrasServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerEventListeners();
    }

    protected function registerEventListeners()
    {
        $events = [
            Events\XtraCreated::class => ['DoSomethingInXtras'],
        ];

        collect($events)->each(function ($listeners, $event) {
            Event::listen($event, $listeners);
        });
    }
}
