<?php

use App\Filament\Resources\ReleaseResource\Pages\ManageReleases;
use App\Filament\Resources\ReleaseSeriesResource;
use App\Filament\Resources\ReleaseSeriesResource\Pages\EditReleaseSeries;
use App\Models\Release;
use App\Models\ReleaseSeries;
use Filament\Tables\Actions\EditAction;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

uses()->group('releases');

beforeEach(fn () => $this->release = Release::factory()->create());

describe('admin user', function () {
    beforeEach(fn () => signInAsAdmin());

    it('fills form with release data', function () {
        livewire(ManageReleases::class)
            ->mountTableAction(EditAction::class, $this->release)
            ->assertTableActionDataSet([
                'version' => $this->release->version,
                'severity' => $this->release->severity->value,
                'link' => $this->release->link,
                'notes' => $this->release->notes,
                'upgrade_guide_link' => $this->release->upgrade_guide_link,
                'release_series_id' => $this->release->release_series_id,
            ]);
    });

    it('updates a release', function () {
        $newReleaseData = Release::factory()->make();

        livewire(ManageReleases::class)
            ->callTableAction(EditAction::class, $this->release, data: [
                'version' => $newReleaseData->version,
                'severity' => $newReleaseData->severity,
                'link' => $newReleaseData->link,
                'published' => $newReleaseData->published,
                'release_series_id' => $newReleaseData->release_series_id,
            ])
            ->assertHasNoTableActionErrors()
            ->assertNotified();

        assertDatabaseHas(Release::class, [
            'id' => $this->release->id,
            'version' => $newReleaseData->version,
            'severity' => $newReleaseData->severity,
            'link' => $newReleaseData->link,
            'published' => $newReleaseData->published,
        ]);
    });
});

describe('staff user', function () {
    beforeEach(fn () => signInAsStaff());

    it('cannot fill form with release data', function () {
        livewire(ManageReleases::class)
            ->assertTableActionHidden(EditAction::class, $this->release);
    });

    it('cannot update a release', function () {
        $newReleaseData = Release::factory()->make();

        livewire(ManageReleases::class)
            ->assertTableActionHidden(EditAction::class, $this->release);

        assertDatabaseMissing(Release::class, [
            'id' => $this->release->id,
            'version' => $newReleaseData->version,
            'severity' => $newReleaseData->severity,
            'link' => $newReleaseData->link,
            'published' => $newReleaseData->published,
        ]);
    });
});

describe('standard user', function () {
    beforeEach(fn () => signInAsUser());

    it('cannot fill form with release data', function () {
        livewire(ManageReleases::class)
            ->assertForbidden();
    });

    it('cannot update a release', function () {
        $newReleaseData = Release::factory()->make();

        livewire(ManageReleases::class)
            ->assertForbidden();

        assertDatabaseMissing(Release::class, [
            'id' => $this->release->id,
            'version' => $newReleaseData->version,
            'severity' => $newReleaseData->severity,
            'link' => $newReleaseData->link,
            'published' => $newReleaseData->published,
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
