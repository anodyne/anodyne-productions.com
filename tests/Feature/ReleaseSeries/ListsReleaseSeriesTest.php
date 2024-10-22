<?php

declare(strict_types=1);

use App\Filament\Resources\ProductResource\Pages\ListProducts;
use App\Filament\Resources\ReleaseSeriesResource;
use App\Filament\Resources\ReleaseSeriesResource\Pages\ListReleaseSeries;
use App\Models\Product;
use App\Models\ReleaseSeries;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

uses()->group('releases');

beforeEach(fn () => $this->series = ReleaseSeries::factory()->create());

describe('admin user', function () {
    beforeEach(fn () => signInAsAdmin());

    it('renders the list release series page', function () {
        get(ReleaseSeriesResource::getUrl())
            ->assertOk();
    });

    it('lists release series', function () {
        $series = ReleaseSeries::get();

        livewire(ListReleaseSeries::class)
            ->assertTableColumnExists('name')
            ->assertTableColumnExists('releases_count')
            ->assertTableColumnExists('include_in_compatibility')
            ->assertCanSeeTableRecords($series)
            ->assertTableActionVisible(ViewAction::class, $series->first())
            ->assertTableActionVisible(EditAction::class, $series->first())
            ->assertTableActionVisible(DeleteAction::class, $series->first());
    });

    it('can update the compatability state of a release series', function () {
        // $product = Product::first();

        // livewire(ListProducts::class);

        // assertDatabaseHas(Product::class, [
        //     'id' => $product->id,
        //     'published' => false,
        // ]);
    })->skip();

    it('can delete a release series', function () {
        $series = ReleaseSeries::first();

        livewire(ListReleaseSeries::class)
            ->callTableAction(DeleteAction::class, $series)
            ->assertHasNoActionErrors()
            ->assertNotified();

        assertDatabaseMissing(ReleaseSeries::class, [
            'id' => $series->id,
        ]);
    });
});

describe('staff user', function () {
    beforeEach(fn () => signInAsStaff());

    it('renders the list products page', function () {
        get(ReleaseSeriesResource::getUrl())
            ->assertForbidden();
    });

    it('lists release series', function () {
        livewire(ListReleaseSeries::class)
            ->assertForbidden();
    });

    it('cannot delete a release series', function () {
        $series = ReleaseSeries::first();

        livewire(ListReleaseSeries::class)
            ->assertForbidden();

        assertDatabaseHas(ReleaseSeries::class, [
            'id' => $series->id,
        ]);
    });
});

describe('standard user', function () {
    beforeEach(fn () => signInAsUser());

    it('renders the list products page', function () {
        get(ReleaseSeriesResource::getUrl())
            ->assertForbidden();
    });

    it('lists release series', function () {
        livewire(ListReleaseSeries::class)
            ->assertForbidden();
    });

    it('cannot delete a release series', function () {
        $series = ReleaseSeries::first();

        livewire(ListReleaseSeries::class)
            ->assertForbidden();

        assertDatabaseHas(ReleaseSeries::class, [
            'id' => $series->id,
        ]);
    });
});

describe('unauthenticated user', function () {
    it('renders the list products page', function () {
        get(ReleaseSeriesResource::getUrl())
            ->assertRedirectToRoute('filament.admin.auth.login');
    });

    it('lists release series', function () {
        livewire(ListReleaseSeries::class)
            ->assertForbidden();
    });

    it('cannot delete a release series', function () {
        $series = ReleaseSeries::first();

        livewire(ListReleaseSeries::class)
            ->assertForbidden();

        assertDatabaseHas(ReleaseSeries::class, [
            'id' => $series->id,
        ]);
    });
});
