<?php

namespace App\Providers;

use SplFileInfo;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        $this->registerRouteFileMacro();
    }

    protected function registerRouteFileMacro()
    {
        Route::macro('file', function ($file) {
            collect(array_wrap($file))->each(function ($file) {
                $path = ($file instanceof SplFileInfo) ? $file->getRealPath() : $file;

                Route::group([], $path);
            });
        });
    }
}
