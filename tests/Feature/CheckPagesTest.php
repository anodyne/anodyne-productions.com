<?php

use App\Filament\Pages\Dashboard;
use App\Filament\Pages\MyProfile;

use function Pest\Laravel\get;

beforeEach(function () {
    signInAsAdmin();
});

it('renders pages without errors', function (string $url) {
    get($url)->assertOk();
})->with([
    '/nova',
    '/nova-3',
    '/nova-3/features',
    '/docs/2.6/introduction',
    '/docs/2.7/introduction',
    '/docs/3.0/introduction',
    'dashboard' => [fn () => Dashboard::getUrl()],
    'my profile' => [fn () => MyProfile::getUrl()],
]);
