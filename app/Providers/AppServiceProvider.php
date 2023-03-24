<?php

namespace App\Providers;

use App\Models;
use App\View\Components\Button;
use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('button', Button::class);

        Relation::morphMap([
            'addon' => Models\Addon::class,
            'question' => Models\Question::class,
            'version' => Models\Version::class,
        ]);

        $this->setupFactories();
        $this->setupMacros();
        $this->setupFilament();
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->callAfterResolving('markdown.environment', function ($environment) {
            $environment->mergeConfig(['heading_permalink' => [
                'html_class' => '',
                'id_prefix' => '',
                'fragment_prefix' => '',
                'symbol' => '',
                'min_heading_level' => 2,
                'max_heading_level' => 3,
            ]]);
        });
    }

    protected function setupFactories()
    {
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            $namespace = 'Database\\Factories\\';

            $modelName = Str::afterLast($modelName, '\\');

            return $namespace.$modelName.'Factory';
        });
    }

    protected function setupFilament(): void
    {
        Filament::serving(function () {
            Filament::registerTheme('/css/filament.css');

            Filament::registerUserMenuItems([
                'account' => UserMenuItem::make()->icon('flex-user-square'),
                'logout' => UserMenuItem::make()->icon('flex-logout'),
            ]);
        });
    }

    protected function setupMacros()
    {
        Builder::macro('search', function ($field, $string) {
            return $string ? $this->where($field, 'like', "%{$string}%") : $this;
        });
    }
}
