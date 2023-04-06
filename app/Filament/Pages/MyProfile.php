<?php

namespace App\Filament\Pages;

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
                  Forms\Components\Select::make('type')->options([
                      'Website' => 'Website',
                      'Email address' => 'Email address',
                      'Discord server' => 'Discord server',
                      'Github repo' => 'Github repo',
                      'Twitter' => 'Twitter',
                      'Mastodon' => 'Mastodon',
                      'Facebook' => 'Facebook',
                  ])->required(),
                  Forms\Components\TextInput::make('value')->required(),
              ]),
        ]);
    }
}
