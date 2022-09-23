<?php

namespace App\Filament\Resources\AddonResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;

class AddonRating extends Widget
{
    public ?Model $record = null;

    protected static string $view = 'filament.resources.addon-resource.widgets.addon-rating';
}
