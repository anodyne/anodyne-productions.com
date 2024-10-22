<?php

declare(strict_types=1);

use App\Filament\Resources\ReleaseSeriesResource;
use App\Filament\Resources\ReleaseSeriesResource\Pages\CreateReleaseSeries;
use App\Models\ReleaseSeries;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

uses()->group('releases');

describe('admin user', function () {
    beforeEach(fn () => signInAsAdmin());

    it('renders the create release series page', function () {
        get(ReleaseSeriesResource::getUrl('create'))
            ->assertOk();
    });

    it('creates a release series', function () {
        $seriesData = ReleaseSeries::factory()->make();

        livewire(CreateReleaseSeries::class)
            ->fillForm([
                'name' => $seriesData->name,
                'include_in_compatibility' => $seriesData->include_in_compatibility,
            ])
            ->call('create')
            ->assertHasNoFormErrors()
            ->assertNotified();

        assertDatabaseHas(ReleaseSeries::class, [
            'name' => $seriesData->name,
            'include_in_compatibility' => $seriesData->include_in_compatibility,
        ]);
    });
});

describe('staff user', function () {
    beforeEach(fn () => signInAsStaff());

    it('cannot render the create release series page', function () {
        get(CreateReleaseSeries::getUrl())->assertForbidden();
    });

    it('cannot create a release series', function () {
        $seriesData = ReleaseSeries::factory()->make();

        livewire(CreateReleaseSeries::class)
            ->assertForbidden();

        assertDatabaseMissing(ReleaseSeries::class, [
            'name' => $seriesData->name,
            'include_in_compatibility' => $seriesData->include_in_compatibility,
        ]);
    });
});

describe('standard user', function () {
    beforeEach(fn () => signInAsUser());

    it('cannot render the create release series page', function () {
        get(CreateReleaseSeries::getUrl())->assertForbidden();
    });

    it('cannot create a release series', function () {
        $seriesData = ReleaseSeries::factory()->make();

        livewire(CreateReleaseSeries::class)
            ->assertForbidden();

        assertDatabaseMissing(ReleaseSeries::class, [
            'name' => $seriesData->name,
            'include_in_compatibility' => $seriesData->include_in_compatibility,
        ]);
    });
});

describe('unauthenticated user', function () {
    test('cannot view the create product page', function () {
        get(CreateReleaseSeries::getUrl())
            ->assertRedirectToRoute('filament.admin.auth.login');
    });

    it('cannot create a release series', function () {
        $seriesData = ReleaseSeries::factory()->make();

        livewire(CreateReleaseSeries::class)
            ->assertForbidden();

        assertDatabaseMissing(ReleaseSeries::class, [
            'name' => $seriesData->name,
            'include_in_compatibility' => $seriesData->include_in_compatibility,
        ]);
    });
});
