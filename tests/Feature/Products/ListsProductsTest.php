<?php

declare(strict_types=1);

use App\Filament\Resources\ProductResource;
use App\Filament\Resources\ProductResource\Pages\ListProducts;
use App\Models\Product;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertDatabaseMissing;
use function Pest\Laravel\get;
use function Pest\Livewire\livewire;

uses()->group('products');

describe('admin user', function () {
    beforeEach(function () {
        signInAsAdmin();
    });

    it('renders the list products page', function () {
        get(ProductResource::getUrl())
            ->assertOk();
    });

    it('lists products', function () {
        $products = Product::get();

        livewire(ListProducts::class)
            ->assertTableColumnExists('name')
            ->assertTableColumnExists('addons_count')
            ->assertTableColumnExists('versions_count')
            ->assertTableColumnExists('published')
            ->assertCanSeeTableRecords($products)
            ->assertTableActionVisible(ViewAction::class, $products->first())
            ->assertTableActionVisible(EditAction::class, $products->first())
            ->assertTableActionVisible(DeleteAction::class, $products->first());
    });

    it('can update the published state of a product', function () {
        // $product = Product::first();

        // livewire(ListProducts::class);

        // assertDatabaseHas(Product::class, [
        //     'id' => $product->id,
        //     'published' => false,
        // ]);
    })->skip();

    it('can delete a product', function () {
        $product = Product::first();

        livewire(ListProducts::class)
            ->callTableAction(DeleteAction::class, $product)
            ->assertHasNoActionErrors()
            ->assertNotified();

        assertDatabaseMissing(Product::class, [
            'id' => $product->id,
        ]);
    });
});

describe('staff user', function () {
    beforeEach(function () {
        signInAsStaff();
    });

    it('renders the list products page', function () {
        get(ProductResource::getUrl())
            ->assertOk();
    });

    it('lists products', function () {
        $products = Product::get();

        livewire(ListProducts::class)
            ->assertTableColumnExists('name')
            ->assertTableColumnExists('addons_count')
            ->assertTableColumnExists('versions_count')
            ->assertTableColumnDoesNotExist('published')
            ->assertCanSeeTableRecords($products)
            ->assertTableActionVisible(ViewAction::class, $products->first())
            ->assertTableActionHidden(EditAction::class, $products->first())
            ->assertTableActionHidden(DeleteAction::class, $products->first());
    });

    it('cannot delete a product', function () {
        $product = Product::first();

        livewire(ListProducts::class)
            ->assertTableActionHidden(DeleteAction::class, $product);

        assertDatabaseHas(Product::class, [
            'id' => $product->id,
        ]);
    });
});

describe('standard user', function () {
    beforeEach(function () {
        signInAsUser();
    });

    it('cannot render the list products page', function () {
        get(ProductResource::getUrl())
            ->assertForbidden();
    });

    it('cannot list products', function () {
        livewire(ListProducts::class)
            ->assertForbidden();
    });

    it('cannot delete a product', function () {
        $product = Product::first();

        livewire(ListProducts::class)
            ->assertForbidden();

        assertDatabaseHas(Product::class, [
            'id' => $product->id,
        ]);
    });
});

describe('unauthenticated user', function () {
    it('cannot render the list products page', function () {
        get(ProductResource::getUrl())
            ->assertRedirectToRoute('filament.admin.auth.login');
    });

    it('cannot list products', function () {
        livewire(ListProducts::class)
            ->assertForbidden();
    });

    it('cannot delete a product', function () {
        $product = Product::first();

        livewire(ListProducts::class)
            ->assertForbidden();

        assertDatabaseHas(Product::class, [
            'id' => $product->id,
        ]);
    });
});
