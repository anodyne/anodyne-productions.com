<?php

use App\Filament\Resources\GameResource;
use App\Models\Game;
use App\Models\Release;
use function Pest\Laravel\get;

uses()->group('games');

beforeEach(function () {
    Release::factory()->create();

    $this->game = Game::factory()->create();
});

it('does not render the edit game page for admins', function () {
    signInAsAdmin();

    get(GameResource::getUrl('edit', $this->game))->assertForbidden();
});

it('renders the edit game page for staff', function () {
    signInAsStaff();

    get(GameResource::getUrl('edit', $this->game))->assertForbidden();
});

it('does not render the edit game page for users', function () {
    signInAsUser();

    get(GameResource::getUrl('edit', $this->game))->assertForbidden();
});

it('redirects guests who try to view the edit game page', function () {
    get(GameResource::getUrl('edit', $this->game))->assertRedirect('/admin/login');
});
