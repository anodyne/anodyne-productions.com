<?php

namespace App\Providers;

use SplFileInfo;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Factory as ViewFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ViewFactory::macro('component', function ($name, $data = []) {
            $name = str_replace(' ', '', ucwords(str_replace('.', ' ', $name)));

            return view('app', ['name' => $name, 'data' => $data]);
        });
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
