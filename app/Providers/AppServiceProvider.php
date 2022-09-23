<?php

namespace App\Providers;

use App\Filament\Resources\AddonResource;
use App\View\Components\Button;
use App\View\Components\LandingDefinitionList;
use App\View\Components\LandingDefinitionListItem;
use App\View\Components\LandingFeatureList;
use App\View\Components\LandingFeatureListItem;
use App\View\Components\LandingPanel;
use App\View\Components\LandingSection;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\UserMenuItem;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

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
        $this->setupFilament();
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

        // Filament::navigation(function (NavigationBuilder $builder): NavigationBuilder {
        //     return $builder->items([
        //         NavigationItem::make('Dashboard')
        //             ->icon('flex-home')
        //             ->isActiveWhen(fn (): bool => request()->routeIs('filament.pages.dashboard'))
        //             ->url(route('filament.pages.dashboard')),
        //         // ...AddonResource::getNavigationItems(),
        //         // ...Settings::getNavigationItems(),
        //     ]);
        // });
    }

    protected function setupMacros()
    {
        Builder::macro('search', function ($field, $string) {
            return $string ? $this->where($field, 'like', "%{$string}%") : $this;
        });
    }
}
