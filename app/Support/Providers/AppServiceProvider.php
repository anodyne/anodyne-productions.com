<?php

namespace Support\Providers;

use Inertia\Inertia;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Support\View\Components\Dropdown;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerInertia();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useTailwind();

        $this->registerBladeComponents();
    }

    protected function registerBladeComponents()
    {
        Blade::component('dropdown', Dropdown::class);
    }

    protected function registerInertia()
    {
        Inertia::setRootView('layouts.app');

        Inertia::version(function () {
            return md5_file(public_path('mix-manifest.json'));
        });

        Inertia::share([
            'auth' => function () {
                return [
                    'user' => Auth::user() ? [
                        'id' => Auth::user()->id,
                        'name' => Auth::user()->name,
                        'username' => Auth::user()->username,
                        'email' => Auth::user()->email,
                    ] : null,
                ];
            },
            'flash' => function () {
                return [
                    'success' => Session::get('success'),
                    'error' => Session::get('error'),
                ];
            },
            'errors' => function () {
                return Session::get('errors')
                    ? Session::get('errors')->getBag('default')->getMessages()
                    : (object) [];
            },
        ]);
    }
}
