<?php

declare(strict_types=1);

use App\Filament\Resources\ProductResource\Pages\ListProducts;
use App\Filament\Resources\ReleaseResource;
use App\Filament\Resources\ReleaseResource\Pages\ManageReleases;
use App\Models\Product;
use App\Models\Release;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

uses()->group('releases');

beforeEach(fn () => $this->release = Release::factory()->create());

describe('admin user', function () {
    beforeEach(fn () => signInAsAdmin());

    it('renders the list releases page', function () {
        get(ReleaseResource::getUrl())
            ->assertOk();
    });

    it('lists releases', function () {
        $releases = Release::get();

        livewire(ManageReleases::class)
            ->assertTableColumnExists('version')
            ->assertTableColumnExists('date')
            ->assertTableColumnExists('severity')
            ->assertTableColumnExists('games_count')
            ->assertTableColumnExists('releaseSeries.name')
            ->assertTableColumnExists('published')
            ->assertCanSeeTableRecords($releases)
            ->assertTableActionVisible(ViewAction::class, $releases->first())
            ->assertTableActionVisible(EditAction::class, $releases->first())
            ->assertTableActionVisible(DeleteAction::class, $releases->first());
    });

    it('can update the published state of a release', function () {
        // $product = Product::first();

        // livewire(ListProducts::class);

        // assertDatabaseHas(Product::class, [
        //     'id' => $product->id,
        //     'published' => false,
        // ]);
    })->skip();

    it('can delete a release', function () {
        $release = Release::first();

        livewire(ManageReleases::class)
            ->callTableAction(DeleteAction::class, $release)
            ->assertHasNoActionErrors()
            ->assertNotified();

        assertDatabaseMissing(Release::class, [
            'id' => $release->id,
        ]);
    });
});

describe('staff user', function () {
    beforeEach(fn () => signInAsStaff());

    it('renders the list releases page', function () {
        get(ReleaseResource::getUrl())
            ->assertOk();
    });

    it('lists releases', function () {
        $releases = Release::get();

        livewire(ManageReleases::class)
            ->assertTableColumnExists('version')
            ->assertTableColumnExists('date')
            ->assertTableColumnExists('severity')
            ->assertTableColumnExists('games_count')
            ->assertTableColumnExists('releaseSeries.name')
            ->assertTableColumnDoesNotExist('published')
            ->assertCanSeeTableRecords($releases)
            ->assertTableActionVisible(ViewAction::class, $releases->first())
            ->assertTableActionHidden(EditAction::class, $releases->first())
            ->assertTableActionHidden(DeleteAction::class, $releases->first());
    });

    it('cannot delete a release', function () {
        $release = Release::first();

        livewire(ManageReleases::class)
            ->assertTableActionHidden(DeleteAction::class, $release);

        assertDatabaseHas(Release::class, [
            'id' => $release->id,
        ]);
    });
});

describe('standard user', function () {
    beforeEach(fn () => signInAsUser());

    it('cannot render the list releases page', function () {
        get(ReleaseResource::getUrl())
            ->assertForbidden();
    });

    it('cannot list releases', function () {
        livewire(ManageReleases::class)
            ->assertForbidden();
    });

    it('cannot delete a release', function () {
        $release = Release::first();

        livewire(ManageReleases::class)
            ->assertForbidden();

        assertDatabaseHas(Release::class, [
            'id' => $release->id,
        ]);
    });
});

describe('unauthenticated user', function () {
    it('cannot render the list releases page', function () {
        get(ReleaseResource::getUrl())
            ->assertRedirectToRoute('filament.admin.auth.login');
    });

    it('cannot list releases', function () {
        livewire(ManageReleases::class)
            ->assertForbidden();
    });

    it('cannot delete a release', function () {
        $release = Release::first();

        livewire(ManageReleases::class)
            ->assertForbidden();

        assertDatabaseHas(Release::class, [
            'id' => $release->id,
        ]);
    });
});
