<?php

declare(strict_types=1);

use App\Filament\Resources\ReleaseResource\Pages\ManageReleases;
use App\Models\Release;
use Filament\Actions\CreateAction;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Livewire\livewire;

uses()->group('releases');

describe('admin user', function () {
    beforeEach(fn () => signInAsAdmin());

    it('creates a release', function () {
        $releaseData = Release::factory()->make();

        livewire(ManageReleases::class)
            ->callAction(CreateAction::class, data: [
                'version' => $releaseData->version,
                'severity' => $releaseData->severity,
                'link' => $releaseData->link,
                'published' => $releaseData->published,
                'release_series_id' => $releaseData->release_series_id,
            ])
            ->assertHasNoActionErrors()
            ->assertNotified();

        assertDatabaseHas(Release::class, [
            'version' => $releaseData->version,
            'severity' => $releaseData->severity,
            'link' => $releaseData->link,
            'published' => $releaseData->published,
            'release_series_id' => $releaseData->release_series_id,
        ]);
    });
});

describe('staff user', function () {
    beforeEach(fn () => signInAsStaff());

    it('cannot create a release', function () {
        $releaseData = Release::factory()->make();

        livewire(ManageReleases::class)
            ->assertActionHidden(CreateAction::class);

        assertDatabaseMissing(Release::class, [
            'version' => $releaseData->version,
            'severity' => $releaseData->severity,
            'link' => $releaseData->link,
            'published' => $releaseData->published,
            'release_series_id' => $releaseData->release_series_id,
        ]);
    });
});

describe('standard user', function () {
    beforeEach(fn () => signInAsUser());

    it('cannot create a release', function () {
        $releaseData = Release::factory()->make();

        livewire(ManageReleases::class)
            ->assertForbidden();

        assertDatabaseMissing(Release::class, [
            'version' => $releaseData->version,
            'severity' => $releaseData->severity,
            'link' => $releaseData->link,
            'published' => $releaseData->published,
            'release_series_id' => $releaseData->release_series_id,
        ]);
    });
});

describe('unauthenticated user', function () {
    it('cannot create a release', function () {
        $releaseData = Release::factory()->make();

        livewire(ManageReleases::class)
            ->assertForbidden();

        assertDatabaseMissing(Release::class, [
            'version' => $releaseData->version,
            'severity' => $releaseData->severity,
            'link' => $releaseData->link,
            'published' => $releaseData->published,
            'release_series_id' => $releaseData->release_series_id,
        ]);
    });
});
