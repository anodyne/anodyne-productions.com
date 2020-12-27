<?php

namespace App\Providers;

use Illuminate\Support\Str;
use App\View\Components\Button;
use App\View\Components\LandingPanel;
use Illuminate\Support\Facades\Blade;
use App\View\Components\LandingSection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use App\View\Components\LandingFeatureList;
use App\View\Components\LandingDefinitionList;
use App\View\Components\LandingFeatureListItem;
use App\View\Components\LandingDefinitionListItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('button', Button::class);

        Blade::component('landing-panel', LandingPanel::class);
        Blade::component('landing-section', LandingSection::class);
        Blade::component('landing-feature-list', LandingFeatureList::class);
        Blade::component('landing-feature-list-item', LandingFeatureListItem::class);
        Blade::component('landing-definition-list', LandingDefinitionList::class);
        Blade::component('landing-definition-list-item', LandingDefinitionListItem::class);

        $this->setupFactories();
        $this->setupMacros();
    }

    protected function setupFactories()
    {
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            $namespace = 'Database\\Factories\\';

            $modelName = Str::afterLast($modelName, '\\');

            return $namespace . $modelName . 'Factory';
        });
    }

    protected function setupMacros()
    {
        Builder::macro('search', function ($field, $string) {
            return $string ? $this->where($field, 'like', "%{$string}%") : $this;
        });
    }
}
