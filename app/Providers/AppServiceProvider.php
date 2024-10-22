<?php

namespace App\Providers;

use App\Models;
use App\View\Components\Button;
use Filament\Support\Facades\FilamentIcon;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DetachAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\ViewAction;
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
            'sponsor' => Models\Sponsor::class,
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

    protected function setupMacros()
    {
        Builder::macro('search', function ($field, $string) {
            return $string ? $this->where($field, 'like', "%{$string}%") : $this;
        });
    }

    protected function setupFilament(): void
    {
        FilamentIcon::register([
            'forms::components.repeater.actions.delete' => 'flex-delete-bin',

            'panels::global-search.field' => 'flex-search',
            'panels::pages.dashboard.navigation-item' => 'flex-home',
            'panels::theme-switcher.light-button' => 'flex-weather-sun',
            'panels::theme-switcher.dark-button' => 'flex-weather-moon',
            'panels::theme-switcher.system-button' => 'flex-computer',
            'panels::user-menu.profile-item' => 'flex-user-square',
            'panels::user-menu.logout-button' => 'flex-logout',

            'tables::actions.filter' => 'flex-filter',
            'tables::actions.toggle-columns' => 'flex-columns',
            'tables::search-field' => 'flex-search',
        ]);

        Action::configureUsing(function (Action $action) {
            $action->iconButton();
        }, isImportant: true);

        DeleteAction::configureUsing(function (DeleteAction $action) {
            $action
                ->icon('flex-delete-bin')
                ->size('md');
        }, isImportant: true);

        DetachAction::configureUsing(function (DetachAction $action) {
            $action
                ->icon('flex-delete-bin')
                ->size('md');
        }, isImportant: true);

        EditAction::configureUsing(function (EditAction $action) {
            $action
                ->icon('flex-edit-circle')
                ->size('md')
                ->color('gray');
        }, isImportant: true);

        ForceDeleteAction::configureUsing(function (ForceDeleteAction $action) {
            $action
                ->icon('flex-delete-bin')
                ->size('md');
        }, isImportant: true);

        RestoreAction::configureUsing(function (RestoreAction $action) {
            $action
                ->icon('flex-delete-bin-restore')
                ->size('md');
        }, isImportant: true);

        ViewAction::configureUsing(function (ViewAction $action) {
            $action
                ->icon('flex-eye')
                ->size('md')
                ->color('gray');
        }, isImportant: true);
    }
}
