<?php

use App\Enums\ReleaseSeverity;
use App\Filament\Resources\ReleaseResource;
use App\Filament\Resources\ReleaseResource\Pages\ManageReleases;
use App\Models\Release;
use Filament\Pages\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

uses()->group('releases');

it('renders the releases resource for admins', function () {
    signInAsAdmin();

    get(ReleaseResource::getUrl())->assertSuccessful();
});

it('renders the releases resource for staff', function () {
    signInAsStaff();

    get(ReleaseResource::getUrl())->assertSuccessful();
});

it('does not render the releases resource for users', function () {
    signInAsUser();

    get(ReleaseResource::getUrl())->assertForbidden();
});

it('does not render the releases resource for guests', function () {
    get(ReleaseResource::getUrl())->assertRedirect('/admin/login');
});

it('lists releases', function () {
    signInAsAdmin();

    $releases = Release::factory()
        ->count(5)
        ->create();

    livewire(ManageReleases::class)
        ->assertTableColumnExists('version')
        ->assertCanSeeTableRecords($releases);
});

test('admins can create a release', function () {
    signInAsAdmin();

    $releaseData = Release::factory()->make();

    livewire(ManageReleases::class)
        ->callPageAction(CreateAction::class, data: [
            'version' => $releaseData->version,
            'severity' => $releaseData->severity,
            'link' => $releaseData->link,
            'published' => $releaseData->published,
            'release_series_id' => $releaseData->release_series_id,
        ])
        ->assertHasNoPageActionErrors()
        ->assertNotified();

    assertDatabaseHas(Release::class, [
        'version' => $releaseData->version,
    ]);
});

test('staff cannot create a release', function () {
    signInAsStaff();

    livewire(ManageReleases::class)
        ->assertPageActionDoesNotExist(CreateAction::class);
});

it('fills edit form with release data', function () {
    signInAsAdmin();

    $releaseToEdit = Release::factory()->create();

    livewire(ManageReleases::class)
        ->mountTableAction(EditAction::class, $releaseToEdit)
        ->assertTableActionDataSet([
            'version' => $releaseToEdit->version,
        ]);
});

it('updates a release', function () {
    signInAsAdmin();

    $releaseToEdit = Release::factory()->create();
    $newReleaseData = Release::factory()->make();

    livewire(ManageReleases::class)
        ->callTableAction(EditAction::class, $releaseToEdit, data: [
            'version' => $newReleaseData->version,
            'severity' => $newReleaseData->severity,
            'link' => $newReleaseData->link,
            'published' => $newReleaseData->published,
            'release_series_id' => $newReleaseData->release_series_id,
        ])
        ->assertHasNoTableActionErrors()
        ->assertNotified();

    assertDatabaseHas(Release::class, [
        'id' => $releaseToEdit->id,
        'version' => $newReleaseData->version,
    ]);
});

test('staff cannot edit a release', function () {
    signInAsStaff();

    livewire(ManageReleases::class)
        ->assertTableActionDoesNotExist(EditAction::class)
        ->assertTableColumnHidden('published');
});

it('deletes a channel', function () {
    signInAsAdmin();

    $releaseToEdit = Release::factory()->create();

    livewire(ManageReleases::class)
        ->callTableAction(DeleteAction::class, $releaseToEdit)
        ->assertNotified();

    assertDatabaseMissing(Release::class, [
        'id' => $releaseToEdit->id,
    ]);
});

test('staff cannot delete a release', function () {
    signInAsStaff();

    livewire(ManageReleases::class)
        ->assertTableActionDoesNotExist(DeleteAction::class);
});

test('`version` field is required', function () {
    signInAsAdmin();

    livewire(ManageReleases::class)
        ->callPageAction(CreateAction::class, data: [
            'version' => null,
            'severity' => ReleaseSeverity::patch,
            'link' => 'https://anodyne-productions.com/nova',
            'published' => true,
        ])
        ->assertHasPageActionErrors(['version' => 'required']);

    $releaseToEdit = Release::factory()->create();

    livewire(ManageReleases::class)
        ->callTableAction(EditAction::class, $releaseToEdit, data: [
            'version' => null,
            'severity' => ReleaseSeverity::patch,
            'link' => 'https://anodyne-productions.com/nova',
            'published' => true,
        ])
        ->assertHasTableActionErrors(['version' => 'required']);
});

test('`severity` field is required', function () {
    signInAsAdmin();

    livewire(ManageReleases::class)
        ->callPageAction(CreateAction::class, data: [
            'version' => '1.0.0',
            'severity' => null,
            'link' => 'https://anodyne-productions.com/nova',
            'published' => true,
        ])
        ->assertHasPageActionErrors(['severity' => 'required']);

    $releaseToEdit = Release::factory()->create();

    livewire(ManageReleases::class)
        ->callTableAction(EditAction::class, $releaseToEdit, data: [
            'version' => '1.0.0',
            'severity' => null,
            'link' => 'https://anodyne-productions.com/nova',
            'published' => true,
        ])
        ->assertHasTableActionErrors(['severity' => 'required']);
});

test('`link` field is required', function () {
    signInAsAdmin();

    livewire(ManageReleases::class)
        ->callPageAction(CreateAction::class, data: [
            'version' => '1.0.0',
            'severity' => ReleaseSeverity::patch,
            'link' => null,
            'published' => true,
        ])
        ->assertHasPageActionErrors(['link' => 'required']);

    $releaseToEdit = Release::factory()->create();

    livewire(ManageReleases::class)
        ->callTableAction(EditAction::class, $releaseToEdit, data: [
            'version' => '1.0.0',
            'severity' => ReleaseSeverity::patch,
            'link' => null,
            'published' => true,
        ])
        ->assertHasTableActionErrors(['link' => 'required']);
});
