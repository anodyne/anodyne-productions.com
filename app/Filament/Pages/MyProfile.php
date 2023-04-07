<?php

namespace App\Filament\Pages;

use App\Enums\LinkType;
use Filament\Forms;
use JeffGreco13\FilamentBreezy\Pages\MyProfile as BaseProfile;

class MyProfile extends BaseProfile
{
    protected function getUpdateProfileFormSchema(): array
    {
        return array_merge(parent::getUpdateProfileFormSchema(), [
            Forms\Components\TextInput::make('username')
                ->required()
                ->helperText('This will be used in the URL of your profile page as well as the URL(s) of any add-on(s) you create. Please use caution when changing this value.'),
            Forms\Components\Repeater::make('links')
                ->schema([
                    Forms\Components\Select::make('type')->options(
                        collect(LinkType::cases())->flatMap(fn ($linkType) => [$linkType->value => $linkType->displayName()])->all()
                    ),
                    Forms\Components\TextInput::make('value')->requiredWith('type'),
                ]),
        ]);
    }
}
