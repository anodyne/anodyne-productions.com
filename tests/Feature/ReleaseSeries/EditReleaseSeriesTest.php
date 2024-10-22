<?php

use App\Filament\Resources\ReleaseSeriesResource;
use App\Filament\Resources\ReleaseSeriesResource\Pages\EditReleaseSeries;
use App\Models\ReleaseSeries;
use Filament\Actions\DeleteAction;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

uses()->group('releases');

beforeEach(fn () => $this->series = ReleaseSeries::factory()->create());

describe('admin user', function () {
    beforeEach(fn () => signInAsAdmin());

    it('renders the edit release series page', function () {
        get(ReleaseSeriesResource::getUrl('edit', [
            'record' => $this->series,
        ]))
            ->assertOk();
    });

    it('fills form with release series data', function () {
        livewire(EditReleaseSeries::class, [
            'record' => $this->series->getKey(),
        ])
            ->assertFormSet([
                'name' => $this->series->name,
                'include_in_compatibility' => $this->series->include_in_compatibility,
            ]);
    });

    it('updates a release series', function () {
        $newSeriesData = ReleaseSeries::factory()->make();

        livewire(EditReleaseSeries::class, [
            'record' => $this->series->getKey(),
        ])
            ->fillForm([
                'name' => $newSeriesData->name,
                'include_in_compatibility' => $newSeriesData->include_in_compatibility,
            ])
            ->call('save')
            ->assertHasNoFormErrors()
            ->assertNotified();

        assertDatabaseHas(ReleaseSeries::class, [
            'id' => $this->series->id,
            'name' => $newSeriesData->name,
            'include_in_compatibility' => $newSeriesData->include_in_compatibility,
        ]);
    });

    it('deletes a release series', function () {
        livewire(EditReleaseSeries::class, [
            'record' => $this->series->getKey(),
        ])
            ->callAction(DeleteAction::class)
            ->assertNotified();

        assertDatabaseMissing(ReleaseSeries::class, [
            'id' => $this->series->id,
        ]);
    });

    test('`name` is required', function () {
        livewire(EditReleaseSeries::class, [
            'record' => $this->series->getKey(),
        ])
            ->fillForm([
                'name' => null,
            ])
            ->call('save')
            ->assertHasFormErrors(['name' => 'required']);
    });
});

describe('staff user', function () {
    beforeEach(fn () => signInAsStaff());

    it('cannot render the edit release series page', function () {
        get(ReleaseSeriesResource::getUrl('edit', [
            'record' => $this->series,
        ]))
            ->assertForbidden();
    });

    it('cannot fill form with release series data', function () {
        livewire(EditReleaseSeries::class, [
            'record' => $this->series->getKey(),
        ])
            ->assertForbidden();
    });

    it('cannot update a release series', function () {
        $newSeriesData = ReleaseSeries::factory()->make();

        livewire(EditReleaseSeries::class, [
            'record' => $this->series->getKey(),
        ])
            ->assertForbidden();

        assertDatabaseMissing(ReleaseSeries::class, [
            'id' => $this->series->id,
            'name' => $newSeriesData->name,
            'include_in_compatibility' => $newSeriesData->include_in_compatibility,
        ]);
    });

    it('cannot delete a release series', function () {
        livewire(EditReleaseSeries::class, [
            'record' => $this->series->getKey(),
        ])
            ->assertForbidden();

        assertDatabaseHas(ReleaseSeries::class, [
            'id' => $this->series->id,
        ]);
    });
});

describe('standard user', function () {
    beforeEach(fn () => signInAsUser());

    it('cannot render the edit release series page', function () {
        get(ReleaseSeriesResource::getUrl('edit', [
            'record' => $this->series,
        ]))
            ->assertForbidden();
    });

    it('cannot fill form with release series data', function () {
        livewire(EditReleaseSeries::class, [
            'record' => $this->series->getKey(),
        ])
            ->assertForbidden();
    });

    it('cannot update a release series', function () {
        $newSeriesData = ReleaseSeries::factory()->make();

        livewire(EditReleaseSeries::class, [
            'record' => $this->series->getKey(),
        ])
            ->assertForbidden();

        assertDatabaseMissing(ReleaseSeries::class, [
            'id' => $this->series->id,
            'name' => $newSeriesData->name,
            'include_in_compatibility' => $newSeriesData->include_in_compatibility,
        ]);
    });

    it('cannot delete a release series', function () {
        livewire(EditReleaseSeries::class, [
            'record' => $this->series->getKey(),
        ])
            ->assertForbidden();

        assertDatabaseHas(ReleaseSeries::class, [
            'id' => $this->series->id,
        ]);
    });
});

describe('unauthenticated user', function () {
    it('cannot render the edit release series page', function () {
        get(ReleaseSeriesResource::getUrl('edit', [
            'record' => $this->series,
        ]))
            ->assertRedirectToRoute('filament.admin.auth.login');
    });

    it('cannot fill form with release series data', function () {
        livewire(EditReleaseSeries::class, [
            'record' => $this->series->getKey(),
        ])
            ->assertForbidden();
    });

    it('cannot update a release series', function () {
        $newSeriesData = ReleaseSeries::factory()->make();

        livewire(EditReleaseSeries::class, [
            'record' => $this->series->getKey(),
        ])
            ->assertForbidden();

        assertDatabaseMissing(ReleaseSeries::class, [
            'id' => $this->series->id,
            'name' => $newSeriesData->name,
            'include_in_compatibility' => $newSeriesData->include_in_compatibility,
        ]);
    });

    it('cannot delete a release series', function () {
        livewire(EditReleaseSeries::class, [
            'record' => $this->series->getKey(),
        ])
            ->assertForbidden();

        assertDatabaseHas(ReleaseSeries::class, [
            'id' => $this->series->id,
        ]);
    });
});
