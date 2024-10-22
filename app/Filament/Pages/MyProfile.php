<?php

namespace App\Filament\Pages;

use App\Enums\LinkType;
use App\Models\User;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyProfile extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $infoFormData = [];

    public ?array $passwordFormData = [];

    public User $user;

    protected static ?string $navigationIcon = 'flex-user-square';

    protected static string $view = 'filament.pages.my-profile';

    public function editInfoForm(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->required(),
                TextInput::make('username')
                    ->required()
                    ->helperText('This will be used in the URL of your profile page as well as the URL(s) of any add-on(s) you create. Please use caution when changing this value.'),
                Repeater::make('links')
                    ->columns(2)
                    ->minItems(1)
                    ->schema([
                        Select::make('type')->options(LinkType::class),
                        TextInput::make('value')->requiredWith('type'),
                    ]),
            ])
            ->model($this->user)
            ->statePath('infoFormData');
    }

    public function updateInfo()
    {
        $this->user->update($this->editInfoForm->getState());

        Notification::make()->title('User info updated')->success()->send();
    }

    public function changePasswordForm(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('password')
                    ->required()
                    ->password()
                    ->revealable()
                    ->confirmed()
                    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                    ->dehydrated(fn (?string $state): bool => filled($state)),
                TextInput::make('password_confirmation')
                    ->required()
                    ->password()
                    ->revealable(),
            ])
            ->model($this->user)
            ->statePath('passwordFormData');
    }

    public function updatePassword()
    {
        $this->user->update($this->changePasswordForm->getState('password'));

        Notification::make()->title('Password updated')->success()->send();

        $this->changePasswordForm->fill();
    }

    public function mount(): void
    {
        $this->user = Auth::user();

        $this->editInfoForm->fill([
            'name' => $this->user->name ?? null,
            'email' => $this->user->email ?? null,
            'username' => $this->user->username ?? null,
            'links' => $this->user->links ?? [],
        ]);

        $this->changePasswordForm->fill();
    }

    protected function getForms(): array
    {
        return [
            'editInfoForm',
            'changePasswordForm',
        ];
    }
}
