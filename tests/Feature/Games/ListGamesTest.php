<?php

use App\Filament\Resources\GameResource;
use function Pest\Laravel\get;

uses()->group('games');

it('renders the list of games for admins', function () {
    signInAsAdmin();

    get(GameResource::getUrl())->assertSuccessful();
});

it('renders the list of games for staff', function () {
    signInAsStaff();

    get(GameResource::getUrl())->assertSuccessful();
});

it('does not render the list of games for users', function () {
    signInAsUser();

    get(GameResource::getUrl())->assertForbidden();
});

it('redirects guests who try to view the list of games', function () {
    get(GameResource::getUrl())->assertRedirect('/admin/login');
});
