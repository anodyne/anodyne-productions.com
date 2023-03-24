<?php

use App\Filament\Resources\GameResource;
use function Pest\Laravel\get;

uses()->group('games');

it('does not render the create game page for admins', function () {
    signInAsAdmin();

    get(GameResource::getUrl('create'))->assertForbidden();
});

it('renders the create game page for staff', function () {
    signInAsStaff();

    get(GameResource::getUrl('create'))->assertForbidden();
});

it('does not render the create game page for users', function () {
    signInAsUser();

    get(GameResource::getUrl('create'))->assertForbidden();
});

it('redirects guests who try to view the create game page', function () {
    get(GameResource::getUrl('create'))->assertRedirect('/admin/login');
});
