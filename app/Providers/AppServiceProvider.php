<?php

namespace App\Providers;

use App\View\Components\LandingPanel;
use Illuminate\Support\Facades\Blade;
use App\View\Components\LandingSection;
use Illuminate\Support\ServiceProvider;
use App\View\Components\LandingFeatureList;
use App\View\Components\LandingDefinitionList;
use App\View\Components\LandingFeatureListItem;
use App\View\Components\LandingDefinitionListItem;

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
        Blade::component('landing-panel', LandingPanel::class);
        Blade::component('landing-section', LandingSection::class);
        Blade::component('landing-feature-list', LandingFeatureList::class);
        Blade::component('landing-feature-list-item', LandingFeatureListItem::class);
        Blade::component('landing-definition-list', LandingDefinitionList::class);
        Blade::component('landing-definition-list-item', LandingDefinitionListItem::class);
    }
}
